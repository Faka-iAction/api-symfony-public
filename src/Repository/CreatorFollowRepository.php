<?php

namespace App\Repository;

use App\Entity\CreatorFollow;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorFollow>
 */
class CreatorFollowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOneFor(Member $member, CreatorProfile $profile): ?CreatorFollow
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return int how many follows were removed: 0 or 1
     */
    public function deleteFor(Member $member, CreatorProfile $profile): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many creators the member follows that the public may see: the ones findPageFor() lists.
     */
    public function countVisibleFor(Member $member): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Most recently followed first, and only creators the public may see.
     *
     * A follow gets its key when it is made, so the key orders one member's follows by
     * the time they were made and breaks the tie between two made in the same second.
     *
     * @return list<CreatorFollow> with their profiles loaded
     */
    public function findPageFor(Member $member, ?CreatorFollow $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
