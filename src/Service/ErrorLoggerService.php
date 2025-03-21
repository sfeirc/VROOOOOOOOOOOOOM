<?php

namespace App\Service;

use Sentry\State\HubInterface;
use Sentry\State\Scope;
use Sentry\Severity;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Security;

class ErrorLoggerService
{
    private HubInterface $sentryHub;
    private RequestStack $requestStack;
    private Security $security;

    public function __construct(
        HubInterface $sentryHub,
        RequestStack $requestStack,
        Security $security
    ) {
        $this->sentryHub = $sentryHub;
        $this->requestStack = $requestStack;
        $this->security = $security;
    }

    public function logError(\Throwable $exception, array $context = []): void
    {
        $request = $this->requestStack->getCurrentRequest();
        $user = $this->security->getUser();

        $this->sentryHub->withScope(function (Scope $scope) use ($exception, $context, $request, $user): void {
            // Add request information
            if ($request) {
                $scope->setContext('request', [
                    'url' => $request->getUri(),
                    'method' => $request->getMethod(),
                    'headers' => $request->headers->all(),
                    'query' => $request->query->all(),
                    'request' => $request->request->all(),
                ]);
            }

            // Add user information if available
            if ($user) {
                $scope->setUser([
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                ]);
            }

            // Add additional context
            if (!empty($context)) {
                $scope->setContext('additional', $context);
            }

            // Capture the exception
            $this->sentryHub->captureException($exception);
        });
    }

    public function logMessage(string $message, string $level = 'info', array $context = []): void
    {
        $this->sentryHub->withScope(function (Scope $scope) use ($message, $level, $context): void {
            // Add additional context
            if (!empty($context)) {
                $scope->setContext('additional', $context);
            }

            // Set the severity level
            $scope->setLevel($level);

            // Capture the message
            $this->sentryHub->captureMessage($message);
        });
    }
} 