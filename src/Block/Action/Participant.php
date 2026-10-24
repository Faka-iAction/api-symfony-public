<?php

namespace App\Block\Action;

use App\Entity\GuestSession;
use App\Entity\Member;

/**
 * The caller of a participation operation: a signed-in member or a guest session, never
 * both (CONVENTIONS.md, section 12.6).
 */
final readonly class Participant
{

    public static function member(Member $member): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function guest(GuestSession $guest): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isGuest(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Scopes idempotency keys to the caller (CONVENTIONS.md, section 9).
     */
    public function scope(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
