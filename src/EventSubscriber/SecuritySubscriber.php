<?php

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Sentry\State\HubInterface;
use Sentry\Severity;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;

class SecuritySubscriber implements EventSubscriberInterface
{
    private LoggerInterface $logger;
    private HubInterface $sentry;

    public function __construct(LoggerInterface $logger, HubInterface $sentry)
    {
        $this->logger = $logger;
        $this->sentry = $sentry;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            SecurityEvents::INTERACTIVE_LOGIN => 'onSecurityInteractiveLogin',
        ];
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void
    {
        $user = $event->getAuthenticationToken()->getUser();
        $message = sprintf('%s %s s\'est connecté', $user->getFirstName(), $user->getLastName());
        
        // Log to file
        $this->logger->info($message, [
            'user' => [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'roles' => $user->getRoles(),
            ],
            'event' => 'user_login',
            'ip' => $event->getRequest()->getClientIp(),
        ]);

        // Log to Sentry
        $this->sentry->withScope(function ($scope) use ($user, $message, $event): void {
            $scope->setUser([
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'username' => $user->getFirstName() . ' ' . $user->getLastName(),
            ]);
            
            $scope->setContext('user_details', [
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'roles' => $user->getRoles(),
                'ip' => $event->getRequest()->getClientIp(),
            ]);

            $scope->setTag('event_type', 'user_login');
            $scope->setLevel(Severity::info());
            
            $this->sentry->captureMessage($message);
        });
    }
}