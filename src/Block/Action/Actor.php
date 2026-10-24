<?php

namespace App\Block\Action;

use App\Entity\GuestSession;
use App\Entity\Member;
use App\Entity\StateTransition;

/**
 * Who caused a state change, as the state history records it.
 */
final readonly class Actor
{

    public static function member(Member $member): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function guest(GuestSession $guest): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function system(): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function participant(Participant $participant): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
