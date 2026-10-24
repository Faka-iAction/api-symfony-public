<?php

namespace App\Repository;

use App\Entity\CreatorCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorCategory>
 */
class CreatorCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A category that can be chosen now. A code that is switched off is as unknown as one
     * that never existed.
     */
    public function findActiveByCode(string $code): ?CreatorCategory
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The categories that can be chosen now, by code.
     *
     * @return list<CreatorCategory>
     */
    public function findAllActive(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
