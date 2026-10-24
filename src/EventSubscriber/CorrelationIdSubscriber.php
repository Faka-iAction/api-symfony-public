<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class CorrelationIdSubscriber implements EventSubscriberInterface
{
    public const HEADER = 'X-Correlation-Id';
    public const ATTRIBUTE = 'correlation_id';

    public static function getSubscribedEvents(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function generate(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromRequest(Request $request): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
