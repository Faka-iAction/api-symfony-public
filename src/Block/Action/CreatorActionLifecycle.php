<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Block\Payment\RefundBlock;
use App\Entity\CreatorAction;
use App\Payment\PaymentState;
use App\Repository\ParticipantActionRepository;
use Psr\Clock\ClockInterface;

/**
 * The system transitions of a Creator Action (state-machines.md 2.2 and 2.3), and what a
 * Creator Action's change does to the participant Actions on it.
 *
 * Time-based transitions are applied whenever a Creator Action is loaded, and in bulk by
 * app:actions:process-deadlines, so the result is the same whichever runs first. Each
 * method only changes entities; the caller flushes inside its transaction, holding the
 * Creator Action's row lock (CreatorActionRepository::lockForUpdate()), so that two
 * requests or two runs of the command cannot apply the same transition twice.
 */
final readonly class CreatorActionLifecycle
{
    public function __construct(
        private ActionHistory $history,
        private ParticipantActionRepository $participants,
        private ClockInterface $clock,
        private RefundBlock $refunds,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * PUBLISHED becomes ACTIVE once its start time is reached and the creator's profile is
     * public (decision 17); PUBLISHED, ACTIVE and PAUSED become EXPIRED once the end time
     * has passed. Pausing or expiry leaves open participant Actions to run on to their own
     * deadlines (decision 6); only votes complete, because voting has closed (decision 20).
     *
     * @return bool whether anything changed
     */
    public function advance(CreatorAction $action): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether advance() would change the Creator Action as it is loaded. Reads only: a caller
     * that gets true takes the row lock, which reloads the row, and calls advance().
     */
    public function isDue(CreatorAction $action): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function mayActivate(CreatorAction $action, \DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Decisions 6 and 18: every unfulfilled participant Action, free or paid, is cancelled.
     * Fulfilled ones are not touched. A paid one's confirmed payment is refunded in full: the
     * refund is requested here, in the same transaction, and sent by a worker (RefundBlock).
     * A payment still open is not refunded here; if it is confirmed later, the Action is
     * closed by then and the late confirmation is refunded.
     *
     * @param string|null $causationId the CreatorActionDisabled event: each ActionCancelled names it as
     *                                 its cause (events/README.md)
     */
    public function cancelOpenParticipation(CreatorAction $action, Actor $actor, ?string $causationId = null): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
