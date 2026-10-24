<?php

namespace App\Repository;

use App\Entity\IdempotencyKey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IdempotencyKey>
 */
class IdempotencyKeyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOneFor(string $scope, string $key): ?IdempotencyKey
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Removes a record with one statement, outside the unit of work, so that it also
     * works after a failure has closed the entity manager.
     */
    public function discard(int $id): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
