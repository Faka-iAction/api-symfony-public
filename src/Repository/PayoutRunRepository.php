<?php

namespace App\Repository;

use App\Entity\PayoutRun;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PayoutRun>
 */
class PayoutRunRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<PayoutRun> most recent first
     */
    public function recent(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
