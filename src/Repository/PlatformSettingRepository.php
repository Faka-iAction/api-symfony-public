<?php

namespace App\Repository;

use App\Entity\PlatformSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlatformSetting>
 */
class PlatformSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, PlatformSetting> by name
     */
    public function allByName(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
