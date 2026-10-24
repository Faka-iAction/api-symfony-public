<?php

namespace App\Repository;

use App\Entity\CreatorProfile;
use App\Entity\CreatorPublicLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorPublicLink>
 */
class CreatorPublicLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<CreatorPublicLink> in the order the creator gave them
     */
    public function findFor(CreatorProfile $profile): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function deleteFor(CreatorProfile $profile): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
