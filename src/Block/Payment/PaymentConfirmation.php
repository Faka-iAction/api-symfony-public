<?php

namespace App\Block\Payment;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Block\Action\ActionFailure;
use App\Block\Action\ActionHistory;
use App\Block\Action\ActionTransaction;
use App\Block\Action\Actor;
use App\Block\Action\BidRankingBlock;
use App\Block\Action\ParticipantViewLoader;
use App\Block\Action\ParticipationBlock;
use App\Entity\ActionMessage;
use App\Entity\CashReceipt;
use App\Entity\ParticipantAction;
use App\Entity\Payment;
use App\Entity\ReconciliationIssue;
use App\Payment\PaymentState;
use App\Payment\Provider\PaymentProvider;
use App\Payment\Provider\ProviderException;
use App\Payment\Provider\ProviderTransaction;
use App\Payment\Provider\TransactionNotFound;
use App\Repository\ActionBidRepository;
use App\Repository\ParticipantActionRepository;
use App\Repository\PaymentRepository;
use Psr\Clock\ClockInterface;

/**
 * Applies what the provider says about a payment. This is the only place a payment's state
 * follows the provider, and it is reached only from a verified notification (the inbox,
 * which then also asks the provider) or a server-to-server verify call (TIS 9.2: "never trust
 * a browser redirect as payment proof"). A redirect back from the provider changes nothing.
 *
 * Everything runs under the Action's row lock (ParticipantActionRepository::lockForUpdate())
 * with the payments reloaded, so a notification, a verify call, the expiry job and a creator's
 * decision on the same Action run one after the other and each sees the others' result.
 *
 * - The amount and currency the provider reports must equal the payment's. A difference
 *   changes nothing: it is listed for an operator.
 * - CONFIRMED is applied once: the payment moves, the ledger journal is posted, and the
 *   Action leaves its pre-payment state (SUBMITTED, with its fulfilment deadline starting now
 *   and the auto-acceptance of the free path; a Tip COMPLETED at once; a Bid also enters the
 *   ranking). A payment confirmed after its Action closed is refunded in full automatically
 *   (LATE_CONFIRMATION).
 * - A bid raise (purpose BID_RAISE) adds to the bid's total and re-ranks, in the same
 *   transaction, while the bid is still ranked. A raise confirmed after the bid left the
 *   ranking is refunded in full (LATE_CONFIRMATION). A raise that fails or expires changes
 *   nothing: the bid keeps its total and rank.
 * - FAILED and EXPIRED close an open payment. An Action with no open payment left whose
 *   checkout windows have all closed becomes FAILED (contract item 70).
 */
final readonly class PaymentConfirmation
{
    public const CONFIRMED = 'CONFIRMED';
    public const FAILED = 'FAILED';
    public const EXPIRED = 'EXPIRED';
    public const REFUNDED = 'REFUNDED';
    public const UNCHANGED = 'UNCHANGED';
    public const MISMATCH = 'MISMATCH';

    public function __construct(
        private PaymentProvider $provider,
        private PaymentRepository $payments,
        private ParticipantActionRepository $participants,
        private PaymentStateMachine $states,
        private LedgerBlock $ledger,
        private RefundBlock $refunds,
        private ReconciliationIssues $issues,
        private ActionHistory $history,
        private ParticipantViewLoader $views,
        private ActionTransaction $transactions,
        private ClockInterface $clock,
        private BidRankingBlock $bidRanking,
        private ActionBidRepository $bids,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Asks the provider about the payment and applies the answer.
     *
     * @return string one of the constants above
     *
     * @throws \App\Payment\Provider\ProviderException when the provider gives no usable answer; nothing changed
     * @throws \App\Block\Action\ActionException      ACTION_STATE_CONFLICT when a concurrent change won
     */
    public function verifyAndApply(Payment $payment, string $trigger): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Applies an answer the caller already has, under the lock.
     */
    public function applyLocked(Payment $payment, ProviderTransaction $transaction, string $trigger): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The amount or currency differs between the payment and what the provider reported, or
     * the provider reported none: the kind of the difference, else null.
     */
    public static function mismatch(Payment $payment, ?int $amountMinor, ?string $currency): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An INITIATED Action with no open payment, whose payments' checkout windows have all
     * closed, never got paid: FAILED. The caller holds the Action's lock and has reloaded
     * its payments (locked()); they are read here as this unit of work holds them.
     */
    public function failIfUnpaid(ParticipantAction $action): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether the provider says the Action's open payment was not paid; true when there is
     * no open payment. A paid one is confirmed here (which then makes the Action count).
     * Unknown or still in progress: false, because its outcome is not known.
     */
    public function openPaymentNotPaid(ParticipantAction $action, string $trigger): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Expires an open payment because the participant withdrew the Action, once the provider
     * has said it is not paid. If the payer pays anyway, the late confirmation refunds it.
     * The caller holds the Action's lock.
     */
    public function withdraw(Payment $payment, string $trigger = 'participant_cancelled', string $failureCode = 'CANCELLED'): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The Action counts from now (decision 24's rule, with "after payment" now meaning after
     * the confirmed payment, or the creator's confirmation of cash). A Tip has no fulfilment
     * step and completes (architecture 7.7). The caller holds the Action's lock.
     *
     * Confirming cash goes through here too (CashBlock): it makes the Action count, as a
     * confirmed payment does, and does not mark it fulfilled (12.5.3.1, criterion 9).
     */
    public function submitPaid(ParticipantAction $action, Actor $actor, string $trigger): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
