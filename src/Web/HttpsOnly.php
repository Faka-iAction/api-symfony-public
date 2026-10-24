<?php

namespace App\Web;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pages that must only be used over HTTPS (the creator's payout details, decision 26). A plain
 * HTTP request is refused, except in the dev and test environments, where it is allowed, as the
 * guest cookie's Secure flag is relaxed there (GuestCookie). Prod always enforces it.
 *
 * Behind a TLS-terminating proxy, Request::isSecure() relies on the trusted proxy settings.
 */
final readonly class HttpsOnly
{
    public function __construct(
        #[Autowire('%kernel.environment%')]
        private string $environment,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Whether the request must be refused (or, for a GET, redirected to HTTPS). */
    public function refuses(Request $request): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
