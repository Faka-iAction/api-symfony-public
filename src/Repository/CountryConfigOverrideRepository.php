<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\CountryConfigOverride;
use App\Entity\CreatorProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CountryConfigOverride>
 */
class CountryConfigOverrideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's override of a key that applies at a moment: its period contains the
     * moment, and it is the one that started last.
     */
    public function findEffective(CreatorProfile $profile, string $configKey, \DateTimeImmutable $at): ?CountryConfigOverride
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
