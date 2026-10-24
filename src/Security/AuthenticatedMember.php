<?php

namespace App\Security;

use App\Entity\Member;
use App\Entity\MemberSession;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * The caller of an API request: the member and the session their access token belongs to.
 */
final readonly class AuthenticatedMember implements UserInterface
{
    public Member $member;

    public function __construct(public MemberSession $session)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRoles(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[\Deprecated]
    public function eraseCredentials(): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUserIdentifier(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
