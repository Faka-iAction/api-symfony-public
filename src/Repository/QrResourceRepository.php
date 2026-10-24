<?php

namespace App\Repository;

use App\Entity\CreatorProfile;
use App\Entity\QrResource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QrResource>
 */
class QrResourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByCode(string $shortCode): ?QrResource
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<QrResource> oldest first
     */
    public function findFor(CreatorProfile $profile): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
