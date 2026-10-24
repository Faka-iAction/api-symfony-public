<?php

namespace App\Repository;

use App\Entity\ReconciliationIssue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReconciliationIssue>
 */
class ReconciliationIssueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByDedupKey(string $dedupKey): ?ReconciliationIssue
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?ReconciliationIssue
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The open exceptions, the most recently seen first.
     *
     * @return list<ReconciliationIssue>
     */
    public function findOpen(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
