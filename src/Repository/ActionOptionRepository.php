<?php

namespace App\Repository;

use App\Entity\ActionOption;
use App\Entity\ActionRequest;
use App\Entity\ActionVote;
use App\Entity\CreatorAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActionOption>
 */
class ActionOptionRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<ActionOption> in display order
     */
    public function findOrdered(CreatorAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOn(CreatorAction $action, string $publicId): ?ActionOption
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Reloads the option with a shared lock, so that its status cannot change and it cannot
     * be deleted before the caller's submission commits.
     *
     * @return bool false when the option has been deleted meanwhile
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForChoice(ActionOption $option): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether any participant Action has chosen it: then it cannot be deleted. A locking read
     * (FOR SHARE), made while the caller holds the Creator Action's lock, under which every
     * Request and Vote is written: it sees one committed after the transaction's snapshot.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function isInUse(ActionOption $option): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
