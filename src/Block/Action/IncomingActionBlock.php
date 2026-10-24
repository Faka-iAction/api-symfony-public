<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Creator\Cursor;
use App\Entity\ActionMessage;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Block\Payment\RefundBlock;
use App\Entity\ParticipantAction;
use App\Payment\PaymentState;
use App\Repository\CreatorActionRepository;
use App\Repository\ParticipantActionRepository;
use Psr\Clock\ClockInterface;

/**
 * The creator's queue: the participant Actions on the creator's own Creator Actions, and
 * accepting, rejecting and fulfilling them (state-machines.md sections 4, 5 and 7).
 *
 * The creator sees whether the participant is a member or a guest and a member's display
 * name, nothing more. A Vote and a Tip have no acceptance or fulfilment step, and a vote
 * is not the creator's to reject (only moderation removes one).
 *
 * Each transition is decided under the row locks of the Creator Action and the Action
 * (ParticipantActionRepository::lockForUpdate()), on the state they reload: two creators'
 * devices accepting and rejecting at once, or a decision racing the deadline or a
 * disable, run one after the other and the second sees the first.
 *
 * Each transition writes its event (ActionAccepted, ActionRejected, ActionFulfilled) through
 * ActionHistory and the creator's decision to the audit log, in the same transaction. For a
 * paid Action, rejection also requests the automatic full refund of its payment, in the same
 * transaction (RefundBlock; architecture 8.1, decision 22).
 */
final readonly class IncomingActionBlock
{
    public const FREE = 'FREE';

    public function __construct(
        private CreatorAccess $access,
        private CreatorActionRepository $creatorActions,
        private ParticipantActionRepository $participants,
        private ParticipantViewLoader $views,
        private ActionDeadlineBlock $deadlines,
        private ActionHistory $history,
        private ClockInterface $clock,
        private ActionTransaction $transactions,
        private AuditLogBlock $audit,
        private RefundBlock $refunds,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Oldest first. Without a state, only Actions that count (submitted at some point).
     *
     * @param string|null $paymentMethodKind FREE, ONLINE or CASH_IN_PERSON; null for all
     *
     * @return Page<ParticipantView>
     *
     * @throws ActionException CAPABILITY_REQUIRED, INVALID_FILTER or INVALID_CURSOR
     */
    public function list(Member $member, ?string $creatorActionId, ?string $type, ?string $state, ?string $paymentMethodKind, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many Actions wait for the creator's answer: submitted or accepted, of a type with
     * an acceptance and fulfilment step. A deadline that has passed is counted until the
     * deadline run or a read of the Action applies it.
     *
     * @throws ActionException CAPABILITY_REQUIRED
     */
    public function countAwaitingCreator(Member $member): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many Actions on one of the creator's Creator Actions are open and unfulfilled: the
     * ones disabling it would cancel (decisions 6 and 18).
     *
     * @throws ActionException CAPABILITY_REQUIRED or CREATOR_ACTION_NOT_FOUND
     */
    public function countOpenOn(Member $member, string $creatorActionId): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CAPABILITY_REQUIRED or ACTION_NOT_FOUND
     */
    public function get(Member $member, string $publicId): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * SUBMITTED to ACCEPTED, before the deadline. Repeating it changes nothing.
     *
     * @throws ActionException CAPABILITY_REQUIRED, ACTION_NOT_FOUND or ACTION_STATE_CONFLICT
     */
    public function accept(Member $member, string $publicId): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * SUBMITTED or ACCEPTED, not fulfilled, to REJECTED. A rejected Shout-out's message is
     * never shown. Repeating it changes nothing.
     *
     * @param string|null $reason may be shown to the participant; kept in the state history
     *
     * @throws ActionException CAPABILITY_REQUIRED, ACTION_NOT_FOUND or ACTION_STATE_CONFLICT
     */
    public function reject(Member $member, string $publicId, ?string $reason): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * ACCEPTED to FULFILLED, before the deadline: the creator's attestation. Repeating it
     * changes nothing. Close-out to COMPLETED is not done (DN-06 is undecided).
     *
     * @throws ActionException CAPABILITY_REQUIRED, ACTION_NOT_FOUND or ACTION_STATE_CONFLICT
     */
    public function fulfil(Member $member, string $publicId): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
