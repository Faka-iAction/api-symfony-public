<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Block\Payment\RefundBlock;
use App\Entity\CreatorAction;
use App\Entity\ParticipantAction;
use App\Payment\PaymentState;
use App\Repository\CreatorActionRepository;
use App\Repository\ParticipantActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The time-based system transitions: fulfilment deadlines of participant Actions
 * (decision 24, DN-11) and the start and end times of Creator Actions (state-machines.md 2.3).
 *
 * Applied to one Action whenever it is about to be read or changed, and in bulk by
 * app:actions:process-deadlines. Running either twice changes nothing the second time:
 * each one locks the row, which reloads it, and decides on the reloaded state. Two runs of
 * the command at the same moment therefore process each Action once: the second waits for
 * the first's lock and then finds nothing left to do.
 *
 * A free Action that expires has no payment effect. For a paid one the refund in full of its
 * confirmed payment is requested in the same transaction (architecture 8.1); a worker sends
 * it to the provider (RefundBlock), exactly once however often this runs.
 */
final readonly class ActionDeadlineBlock
{

    public function __construct(
        private ParticipantActionRepository $participants,
        private CreatorActionRepository $creatorActions,
        private CreatorActionLifecycle $lifecycle,
        private ActionHistory $history,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
        private ActionTransaction $transactions,
        private RefundBlock $refunds,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * SUBMITTED or ACCEPTED, not fulfilled, past its deadline: EXPIRED. The caller holds the
     * row lock (ParticipantActionRepository::lockForUpdate()) and flushes.
     */
    public function expireIfDue(ParticipantAction $action): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Applies the deadline to one Action and saves the result. Only an Action that looks
     * due is locked; the lock reloads it and the deadline is decided again on that.
     */
    public function apply(ParticipantAction $action): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Everything due now, in batches. Each Action is changed in its own transaction under
     * its own row lock, so that two runs of the command never hold locks the other waits
     * for in a different order.
     */
    public function processDue(): DeadlineReport
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
