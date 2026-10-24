<?php

namespace App\Security;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Loads the member of a web session from its public ID on every request. A member who is
 * no longer active is not found, which ends the session.
 *
 * @implements UserProviderInterface<WebMember>
 */
final readonly class WebMemberProvider implements UserProviderInterface
{
    public function __construct(private MemberRepository $members)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function loadUserByIdentifier(string $identifier): WebMember
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function refreshUser(UserInterface $user): WebMember
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function supportsClass(string $class): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
