<?php

namespace App\Security;

use App\Entity\Member;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * The member of a web session, on the `main` firewall. The session stores the member's
 * public ID and nothing else; WebMemberProvider loads the member again on every request,
 * so a suspended or closed member is signed out at once.
 *
 * Never an API caller: the `api` firewall uses AuthenticatedMember and a bearer token, and
 * neither firewall accepts the other's credential (architecture 22.3 and 43.1).
 */
final class WebMember implements UserInterface, EquatableInterface
{

    public function __construct(private ?Member $member)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function member(): Member
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

    public function isEqualTo(UserInterface $user): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Only the public ID goes into the session: never the entity, and nothing personal.
     *
     * @return array{publicId: string}
     */
    public function __serialize(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array{publicId?: mixed} $data
     */
    public function __unserialize(array $data): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
