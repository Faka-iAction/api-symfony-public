<?php

namespace App\Web;

use App\Action\ParticipationSettings;
use App\Block\Action\ActionException;
use App\Block\Action\GuestSessionBlock;
use App\Entity\GuestSession;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * The guest cookie: the only state a guest's browser holds on the web (architecture 5 and
 * 43.1). It carries the guest token that GuestSessionBlock issued, in the same way the API
 * carries it in X-Guest-Token. The session lasts the configured time and every use renews
 * it (decision 23), so the cookie is sent again with a fresh lifetime on each use.
 *
 * HttpOnly, SameSite=Lax and Secure. Secure is relaxed only in the dev and test
 * environments, and there only for a request that did not arrive over HTTPS.
 */
final readonly class GuestCookie
{
    public const NAME = 'faka_guest';

    public function __construct(
        private GuestSessionBlock $guests,
        private ParticipationSettings $settings,
        #[Autowire('%kernel.environment%')]
        private string $environment,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The guest session of the cookie, renewed, with its token; null when there is no cookie
     * or it no longer names a live session.
     *
     * @return array{GuestSession, string}|null
     */
    public function resolve(Request $request): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The live guest session of the cookie, without renewing it; null as for resolve().
     */
    public function peek(Request $request): ?GuestSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Tells the browser to drop its guest cookie: the guest session is no longer this
     * browser's to use (it was converted to the member signed in).
     */
    public function clear(Response $response, Request $request): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function attach(Response $response, Request $request, #[\SensitiveParameter] string $token): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
