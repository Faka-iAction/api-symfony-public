<?php

namespace App\Block\Action;

use App\Entity\GuestSession;

/**
 * A new guest session and its token. The token exists only here and in the response: the
 * database keeps its hash.
 */
final readonly class IssuedGuestSession
{
    public function __construct(
        public GuestSession $session,
        #[\SensitiveParameter]
        public string $token,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
