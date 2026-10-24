<?php

namespace App\Repository;

use App\Entity\ModerationCase;
use App\Entity\Report;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Report>
 */
class ReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Report> oldest first
     */
    public function findForCase(ModerationCase $case): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<ModerationCase> $cases
     *
     * @return array<int, int> case ID => number of reports
     */
    public function countForCases(array $cases): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
