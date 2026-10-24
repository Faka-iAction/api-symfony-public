<?php

namespace App\Security;

use App\Repository\MemberSessionRepository;
use Psr\Clock\ClockInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * How long ago the caller last proved who they are, for the high-risk changes that need a
 * recent sign-in (TIS 10.2): giving or changing payout details.
 *
 * - API: the sign-in that started the access token's family (MemberSessionRepository::
 *   familySignedInAt()); a refresh is not a sign-in.
 * - Web: the sign-in time kept in the server-side session (SignInTime), as the admin pages use.
 *
 * Null when it is not known, which counts as too old.
 */
final readonly class RecentSignIn
{
    public function __construct(
        private MemberSessionRepository $sessions,
        private SignInTime $webSignIn,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function apiAge(AuthenticatedMember $caller): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function webAge(Request $request): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
