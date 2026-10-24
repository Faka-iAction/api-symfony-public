<?php

namespace App\Block\Identity;

use App\Entity\Member;

final readonly class SignInOutcome
{
    /**
     * @param bool $memberCreated whether this sign-in created the member
     */
    public function __construct(
        public Member $member,
        public IssuedTokens $tokens,
        public bool $hasPassword,
        public bool $memberCreated,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
