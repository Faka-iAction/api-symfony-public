<?php

namespace App\Block\Identity;

use App\Entity\Member;

/**
 * A web sign-in: who proved who they are. Unlike SignInOutcome it carries no tokens, because
 * the web keeps the member in its own server-side session and never holds an API token
 * (architecture 22.3 and 43.1).
 */
final readonly class SignedIn
{
    /**
     * @param bool $memberCreated whether this sign-in created the member
     */
    public function __construct(
        public Member $member,
        public bool $hasPassword,
        public bool $memberCreated,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
