<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Psr\Log\LoggerInterface;

class RequestLoggerSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $uri = $request->getUri();
        $method = $request->getMethod();
        $ip = $request->getClientIp();

        $this->logger->info('Page visited (customized log)', [
            'uri' => $uri,
            'method' => $method,
            'ip' => $ip,
        ]);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }
}