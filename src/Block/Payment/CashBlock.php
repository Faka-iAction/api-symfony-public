<?php

namespace App\Block\Payment;

use App\Action\ActionState;
use App\Action\Money;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\ActionHistory;
use App\Block\Action\ActionTransaction;
use App\Block\Action\Actor;
use App\Block\Action\CreatorAccess;
use App\Block\Action\Page;
use App\Block\Action\Participant;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Country\CountryBlock;
use App\Block\Creator\Cursor;
use App\Entity\CashReceipt;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Entity\ParticipantAction;
use App\Identity\SecretFactory;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\CashReceiptRepository;
use App\Repository\CreatorActionRepository;
use App\Repository\ParticipantActionRepository;
use App\Repository\PaymentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Cash paid in person, directly to the creator (architecture 12.5.3, 12.5.3.1 and 13.4.1;
 * TIS 9.4; state-machines.md section 10; contract operations reportCashPayment,
 * listOwnCashReceipts, confirmCashReceipt, voidCashReceipt and correctCashReceipt).
 *
 * - Offered only where the Creator Action is paid and enables cash, it is not a Bid
 *   (decision 3), and the recipient profile is self-managed (CashOffer); otherwise
 *   CASH_NOT_AVAILABLE.
 * - Reporting creates a pending receipt and moves the Action to INITIATED. Nothing counts
 *   until the creator confirms. An open online payment is first looked up and expired where
 *   it was not paid, so that the participant is never charged twice; an unknown outcome
 *   refuses (PAYMENT_ALREADY_IN_PROGRESS).
 * - Only the authenticated member who owns the self-managed recipient profile confirms,
 *   voids or corrects: no manager, staff member, administrator or the customer. The amount
 *   the creator restates must equal the receipt's (AMOUNT_MISMATCH, CURRENCY_MISMATCH).
 * - Confirmation records who and when, posts a memo on the ledger's cash accounts (never a
 *   balance, payout or reconciliation figure), and makes the Action count (SUBMITTED, a Tip
 *   COMPLETED). It does not fulfil the Action. It is idempotent by state: confirming again
 *   returns the confirmed receipt and creates nothing.
 * - The platform fee and processing fee are zero, always; nothing is recovered elsewhere.
 * - A confirmed receipt is never edited or deleted; a correction is a new compensating
 *   receipt with a reason, and the original stays visible.
 * - Cash has no refund: FAKA holds no cash (architecture 8.1).
 *
 * Every change runs under the Action's row lock (ParticipantActionRepository::lockForUpdate())
 * and then the receipt's, so a confirmation, a void, a withdrawal and a correction of the same
 * Action run one after the other and each sees the others' result.
 */
final readonly class CashBlock
{
    public const CLOSE_CASH_NOT_RECEIVED = 'CASH_NOT_RECEIVED';

    public function __construct(
        private ParticipantActionRepository $participants,
        private CashReceiptRepository $receipts,
        private CreatorActionRepository $creatorActions,
        private PaymentRepository $payments,
        private PaymentConfirmation $confirmation,
        private LedgerBlock $ledger,
        private ActionHistory $history,
        private ActionTransaction $transactions,
        private CreatorAccess $access,
        private CountryBlock $countries,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private SecretFactory $secrets,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The cash method for this Action now, or nothing (listActionPaymentMethods).
     *
     * @return list<array{code: string, kind: string, displayName: string}>
     */
    public function methodsFor(ParticipantAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The participant chooses to pay the creator in cash, in person. An Action has at most
     * one cash receipt: a repeated report returns it.
     *
     * @throws ActionException ACTION_NOT_FOUND, CASH_NOT_AVAILABLE, ACTION_NOT_PAYABLE or PAYMENT_ALREADY_IN_PROGRESS
     */
    public function report(Participant $participant, string $actionId): CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The receipts on the caller's Creator Actions, most recent first.
     *
     * @return Page<CashReceipt>
     *
     * @throws ActionException CAPABILITY_REQUIRED, FORBIDDEN, INVALID_FILTER or INVALID_CURSOR
     */
    public function listOwn(Member $member, bool $pendingOnly, ?string $state, ?string $creatorActionId, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One receipt on the caller's profile, with its corrections (oldest first).
     *
     * @return array{CashReceipt, list<CashReceipt>}
     *
     * @throws ActionException CAPABILITY_REQUIRED, FORBIDDEN or CASH_RECEIPT_NOT_FOUND
     */
    public function getOwn(Member $member, string $receiptId): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The owning creator attests receipt of the cash.
     *
     * @throws ActionException CAPABILITY_REQUIRED, FORBIDDEN, CASH_RECEIPT_NOT_FOUND, INVALID_INPUT
     *                         (AMOUNT_MISMATCH, CURRENCY_MISMATCH) or CASH_RECEIPT_STATE_CONFLICT
     */
    public function confirm(Member $member, string $receiptId, Money $amount, ?string $note): CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The owning creator says the cash was not received: the receipt is voided (its state
     * does not change) and the Action FAILED. Repeating it changes nothing.
     *
     * @throws ActionException CAPABILITY_REQUIRED, FORBIDDEN, CASH_RECEIPT_NOT_FOUND or CASH_RECEIPT_STATE_CONFLICT
     */
    public function void(Member $member, string $receiptId, ?string $note): CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A compensating record for a confirmed receipt (12.5.3.1, criterion 8): the amount the
     * creator now attests was received, zero when none was, with a reason. The original is not
     * changed. Nothing moves money, refunds or changes the Action.
     *
     * @throws ActionException CAPABILITY_REQUIRED, FORBIDDEN, CASH_RECEIPT_NOT_FOUND, INVALID_INPUT
     *                         (CURRENCY_MISMATCH) or CASH_RECEIPT_STATE_CONFLICT
     */
    public function correct(Member $member, string $receiptId, Money $amount, string $reason): CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The participant withdrew the Action before the creator confirmed: its pending receipt
     * is voided. The caller holds the Action's lock and commits.
     */
    public function voidWithdrawn(ParticipantAction $action): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
