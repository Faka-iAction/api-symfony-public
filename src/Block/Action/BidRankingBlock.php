<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Entity\ActionBid;
use App\Entity\CreatorAction;
use App\Entity\ParticipantAction;
use App\Entity\Payment;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\ActionBidRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The ranking of Bids (architecture 7.4.1; TIS 8.2.1; state-machines.md section 6).
 *
 * Ranks are recalculated on the server whenever a bid enters the ranking (its first payment
 * is confirmed), is raised (a raise payment is confirmed) or leaves it (fulfilled, rejected,
 * cancelled or expired). Every caller holds the Creator Action's row lock
 * (ParticipantActionRepository::lockForUpdate() locks it before the Action), so the ranking
 * of one Creator Action is changed by one transaction at a time; that lock is the arbiter of
 * concurrent bids. The caller's transaction commits. Pending changes are flushed before the
 * ranked bids are read with the lock: that read reloads them, and would otherwise undo a
 * change made earlier in the same transaction (several bids leaving at once).
 *
 * Rule (the default and only one in MVP1, HIGHEST_TOTAL_FIRST): highest total first; ties by
 * the earliest confirmed payment that brought the bid to its current total. A new bid does
 * not have to beat the highest one; it takes the place its total gives it.
 *
 * Idempotent: a replayed confirmation finds its payment already CONFIRMED and never reaches
 * here (PaymentConfirmation), and a recalculation that finds every rank already right changes
 * nothing and emits nothing. A bid that moves emits BidRankChanged once per move. An outbid
 * bid keeps its state and its payments.
 */
final readonly class BidRankingBlock
{
    public function __construct(
        private ActionBidRepository $bids,
        private Outbox $outbox,
        private ClockInterface $clock,
        private EntityManagerInterface $entityManager,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The bid's first payment was confirmed: it enters the ranking with that amount.
     *
     * @return int the bid's rank
     */
    public function enter(ParticipantAction $action, Payment $payment, ?string $causationId = null): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A raise payment was confirmed: the bid's total grows by it and the ranks are recalculated.
     */
    public function raise(ParticipantAction $action, Payment $payment, ?string $causationId = null): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The bid left the ranking. The others move up, except when the Creator Action was
     * disabled: then every open bid is cancelled in the same transaction, and telling each
     * one it moved up before it is cancelled would be noise.
     */
    public function leave(ParticipantAction $action, ?string $causationId = null): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Recalculates the ranks of a Creator Action's bids from what the database holds. Changes
     * nothing when every rank is already right.
     *
     * @return int how many bids moved
     */
    public function rerank(CreatorAction $action): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether raiseBid would be accepted now (contract ParticipantAction.canRaise, before the
     * check of an open payment): a ranked Bid, waiting for the creator, on a Creator Action
     * that is open (ACTIVE and inside its window).
     */
    public static function raisable(ParticipantAction $action, ?ActionBid $bid, \DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Rank of one bid among those ranked, and their number (BidPosition, BidStatus).
     *
     * @return array{rank: int|null, rankedBidCount: int}
     */
    public function position(ActionBid $bid): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
