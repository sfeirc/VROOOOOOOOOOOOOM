<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[Route('/contact')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'app_contact')]
    public function index(Request $request, ?MailerInterface $mailer = null): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $subject = $request->request->get('subject');
            $message = $request->request->get('message');

            if ($mailer) {
                $email = (new Email())
                    ->from($email)
                    ->to('contact@vroom.com')
                    ->subject($subject)
                    ->text("Message de $name ($email):\n\n$message")
                    ->html("<p><strong>Message de $name ($email):</strong></p><p>$message</p>");

                $mailer->send($email);
                $this->addFlash('success', 'Votre message a été envoyé avec succès.');
            } else {
                $this->addFlash('warning', 'Le service de messagerie n\'est pas disponible pour le moment. Veuillez réessayer plus tard.');
            }

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig');
    }
} 