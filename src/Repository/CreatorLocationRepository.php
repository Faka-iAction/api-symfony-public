<?php

namespace App\Repository;

use App\Entity\CreatorLocation;
use App\Entity\CreatorProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorLocation>
 */
class CreatorLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findPrimaryFor(CreatorProfile $profile): ?CreatorLocation
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The city of the primary location of several profiles in one query.
     *
     * @param list<CreatorProfile> $profiles
     *
     * @return array<int, string|null> by the internal key of the profile
     */
    public function citiesFor(array $profiles): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
