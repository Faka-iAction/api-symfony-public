<?php

namespace App\Repository;

use App\Entity\ModerationAction;
use App\Entity\ModerationCase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Reads only: decisions are added by ModerationBlock and never changed or removed.
 *
 * @extends ServiceEntityRepository<ModerationAction>
 */
class ModerationActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<ModerationAction> oldest first
     */
    public function findForCase(ModerationCase $case): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
