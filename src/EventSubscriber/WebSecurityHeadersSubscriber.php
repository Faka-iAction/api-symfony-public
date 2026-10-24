<?php

namespace App\EventSubscriber;

use App\EventListener\ApiExceptionListener;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Security headers for the server-rendered web pages. API responses under /api/ are left
 * exactly as they were: the API is not a browser document.
 *
 * The policy allows this origin only. Pages have no inline script or style: the one
 * optional script and the stylesheet are static files under public/. The admin pages
 * (Tabler) also allow data: images; see ADMIN_CONTENT_SECURITY_POLICY.
 */
final readonly class WebSecurityHeadersSubscriber implements EventSubscriberInterface
{
    public const CONTENT_SECURITY_POLICY = "default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self'; "
        ."font-src 'self'; connect-src 'self'; object-src 'none'; base-uri 'none'; form-action 'self'; frame-ancestors 'none'";

    /**
     * The admin pages use the Tabler theme, whose stylesheet draws select arrows and check
     * marks as data: SVG images. Everything else is the web policy.
     */
    public const ADMIN_CONTENT_SECURITY_POLICY = "default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self' data:; "
        ."font-src 'self'; connect-src 'self'; object-src 'none'; base-uri 'none'; form-action 'self'; frame-ancestors 'none'";

    public function __construct(
        #[Autowire('%kernel.debug%')]
        private bool $debug,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function getSubscribedEvents(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
