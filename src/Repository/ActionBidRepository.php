<?php

namespace App\Repository;

use App\Block\Action\Participant;
use App\Action\ActionState;
use App\Entity\ActionBid;
use App\Entity\CreatorAction;
use App\Entity\ParticipantAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActionBid>
 */
class ActionBidRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findForAction(ParticipantAction $action): ?ActionBid
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The ranked bids of a Creator Action, locked and reloaded, in rank order: highest total
     * first, then the earliest confirmation of the payment that reached that total
     * (ActionBid::$reachedSequence). The caller holds the Creator Action's lock, which is what serialises
     * ranking; the locking read also sees what was committed before the lock was granted.
     *
     * @return list<ActionBid>
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockRanked(CreatorAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The order of the default ranking rule (HIGHEST_TOTAL_FIRST; ties by earliest confirmed
     * payment that reached the current total).
     */
    public static function compare(ActionBid $a, ActionBid $b): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The next confirmation number among the Creator Action's bids. Read under the Creator
     * Action's lock, so no two bids get the same number.
     */
    public function nextSequence(CreatorAction $action): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function countRanked(CreatorAction $action): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The highest ranked total, or null when no bid is ranked.
     */
    public function topTotal(CreatorAction $action): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Bids this participant has on the Creator Action that still count towards "maximum
     * participant bids": every one except those withdrawn or never paid. A locking read
     * (FOR SHARE) under the Creator Action's lock, as ParticipantActionRepository's counts.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function countBidsBy(CreatorAction $action, Participant $participant): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
