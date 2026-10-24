<?php

namespace App\Repository;

use App\Entity\ModerationCase;
use App\Moderation\Moderation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModerationCase>
 */
class ModerationCaseRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?ModerationCase
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOpenFor(string $subjectType, int $subjectId): ?ModerationCase
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function lockForUpdate(ModerationCase $case): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The queue: every case that is not closed, escalated ones first, then oldest first.
     *
     * @return list<ModerationCase>
     */
    public function findQueue(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
