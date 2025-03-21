<?php

namespace App\EventSubscriber;

use App\Service\ErrorLoggerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    private ErrorLoggerService $errorLogger;

    public function __construct(ErrorLoggerService $errorLogger)
    {
        $this->errorLogger = $errorLogger;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $this->errorLogger->logError($exception);
    }
} 