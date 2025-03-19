<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/auth')]
class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        ValidatorInterface $validator
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        if ($request->isMethod('POST')) {
            $user = new User();
            $user->setEmail($request->request->get('email'));
            $user->setFirstName($request->request->get('firstName'));
            $user->setLastName($request->request->get('lastName'));
            $user->setPhone($request->request->get('phone'));
            
            $plainPassword = $request->request->get('password');
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $plainPassword
                )
            );

            $errors = $validator->validate($user);
            if (count($errors) > 0) {
                $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
                return $this->render('registration/register.html.twig', [
                    'errors' => $errors
                ]);
            }

            if ($userRepository->findByEmail($user->getEmail())) {
                $this->addFlash('error', 'Un compte avec cet email existe déjà.');
                return $this->render('registration/register.html.twig');
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre compte a été créé avec succès.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig');
    }
} 