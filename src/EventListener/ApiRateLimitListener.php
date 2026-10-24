<?php

namespace App\EventListener;

use App\Api\ApiRoute;
use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\RateLimiter\RateLimiterFactoryInterface;

/**
 * Applies the rate limits of /api/, keyed on the client address.
 *
 * Every request counts against the anonymous limiter. Registration, asking for a
 * one-time code, sign-in and token refresh also count against the stricter
 * `api_authentication` limiter; guest-session creation and participation against
 * `api_participation`. The per-identifier limit on one-time codes is not here:
 * it is the resend interval, enforced by VerificationBlock.
 */
final class ApiRateLimitListener
{
    public function __construct(
        #[Autowire(service: 'limiter.api_anonymous')]
        private readonly RateLimiterFactoryInterface $anonymousLimiter,
        #[Autowire(service: 'limiter.api_authentication')]
        private readonly RateLimiterFactoryInterface $authenticationLimiter,
        #[Autowire(service: 'limiter.api_participation')]
        private readonly RateLimiterFactoryInterface $participationLimiter,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    // Priority 64: after the correlation ID is set (255), so that the 429 carries one,
    // and before routing (32), so that probing for unknown paths is limited as well.
    #[AsEventListener(event: KernelEvents::REQUEST, priority: 64)]
    public function onKernelRequest(RequestEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    // Priority 16: after routing (32), which says whether the operation is a sign-in
    // operation, and before the firewall (8) and the controller do any work.
    #[AsEventListener(event: KernelEvents::REQUEST, priority: 16)]
    public function onRoutedRequest(RequestEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
