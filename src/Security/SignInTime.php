<?php

namespace App\Security;

use Psr\Clock\ClockInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * When the member of a web session last proved who they are (TIS 10.2: high-risk actions
 * need recent authentication). The web sign-in records it in the server-side session as it
 * logs the member in; the admin pages refuse a session whose sign-in is older than the
 * configured period (App\EventSubscriber\AdminGateSubscriber).
 *
 * Only the time is kept, in the session, never in a cookie of its own. A session without it
 * (one started before this was recorded) counts as too old.
 */
final readonly class SignInTime
{
    public const SESSION_KEY = 'web_auth.signed_in_at';

    public function __construct(private ClockInterface $clock)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function record(Request $request): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return int|null seconds since the session's sign-in; null when it was never recorded
     */
    public function age(Request $request): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
