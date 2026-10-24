<?php

namespace App\Repository;

use App\Entity\Member;
use App\Entity\MemberIdentifier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MemberIdentifier>
 */
class MemberIdentifierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $value already normalised
     */
    public function findContact(string $type, string $value): ?MemberIdentifier
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findSocial(string $provider, string $subject): ?MemberIdentifier
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOwned(Member $member, string $publicId): ?MemberIdentifier
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function countFor(Member $member): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Oldest first. The internal key is the tie-breaker and the page boundary, because
     * several identifiers can be linked within the same second.
     *
     * @return list<MemberIdentifier>
     */
    public function findPageFor(Member $member, ?MemberIdentifier $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
