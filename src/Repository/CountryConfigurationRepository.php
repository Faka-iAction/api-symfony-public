<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\CountryConfiguration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CountryConfiguration>
 */
class CountryConfigurationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The version of a key that applies at a moment: ACTIVE, its period contains the moment
     * (from inclusive, until exclusive), and the highest version among those. A version
     * dated after the moment is not used yet.
     */
    public function findEffective(string $countryCode, string $configKey, \DateTimeImmutable $at): ?CountryConfiguration
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The highest version stored for a key, whatever its status; 0 when there is none.
     */
    public function lastVersion(string $countryCode, string $configKey): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
