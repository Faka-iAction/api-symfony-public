<?php

namespace App\Repository;

use App\Entity\CreatorHandleHistory;
use App\Entity\CreatorProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorHandleHistory>
 */
class CreatorHandleHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whoever holds the handle, as a current or as a former one.
     *
     * @param string $handle in lower case
     */
    public function findByHandle(string $handle): ?CreatorHandleHistory
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findCurrentFor(CreatorProfile $profile): ?CreatorHandleHistory
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
