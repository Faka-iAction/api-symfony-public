<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Block\Creator\Cursor;
use App\Block\Payment\CashBlock;
use App\Block\Payment\PaymentConfirmation;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Entity\ParticipantAction;
use App\Repository\ParticipantActionRepository;
use App\Repository\PaymentRepository;

/**
 * A participant's own Actions: reading one, listing a member's, and withdrawing one.
 * An Action that belongs to someone else is not told apart from one that does not exist.
 */
final readonly class ParticipantActionBlock
{
    public function __construct(
        private ParticipantActionRepository $participants,
        private ParticipantViewLoader $views,
        private ActionDeadlineBlock $deadlines,
        private CreatorActionBlock $creatorActions,
        private ActionHistory $history,
        private ActionTransaction $transactions,
        private PaymentRepository $payments,
        private PaymentConfirmation $confirmation,
        private CashBlock $cash,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException ACTION_NOT_FOUND
     */
    public function get(Participant $participant, string $publicId): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The caller's bid with its current position (getBidPosition), after applying what time
     * has done: a bid whose deadline passed has left the ranking.
     *
     * @throws ActionException ACTION_NOT_FOUND, or ACTION_STATE_CONFLICT when it is not a Bid
     */
    public function bidPosition(Participant $participant, string $publicId): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Members only; a guest reads each Action by its `id`. Most recent first.
     *
     * @return Page<ParticipantView>
     *
     * @throws ActionException INVALID_CURSOR
     */
    public function listOwn(Member $member, ?string $type, ?string $state, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One guest session's own Actions, most recent first: what the guest could already read
     * one by one with the session (getAction), as a list. Only that session's Actions are
     * ever listed. The contract has no list operation for a guest; the web uses this for a
     * guest's Activity page.
     *
     * @return Page<ParticipantView>
     *
     * @throws ActionException INVALID_CURSOR
     */
    public function listOwnAsGuest(GuestSession $guest, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many Actions the guest session sent (that reached the creator at some point).
     */
    public function countSentByGuest(GuestSession $guest): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Withdraws an Action before payment is confirmed (decision 7): only from CREATED or
     * INITIATED. A free Action is SUBMITTED from the moment it is sent, so it can never be
     * withdrawn; a Vote never can (decision 9). Repeating the call on an Action the caller
     * withdrew changes nothing.
     *
     * An open online payment is first looked up with the provider (contract item 75): paid,
     * it is confirmed and the cancellation is refused; not paid (failed, abandoned or unknown
     * to the provider), it is expired with the Action; anything else (still in progress, or
     * no answer) refuses the cancellation, because its outcome is not known. If the payer
     * pays an expired checkout anyway, the late confirmation is refunded in full.
     *
     * @throws ActionException ACTION_NOT_FOUND or ACTION_NOT_CANCELLABLE
     */
    public function cancel(Participant $participant, string $publicId): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function canCancel(ParticipantAction $action): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
