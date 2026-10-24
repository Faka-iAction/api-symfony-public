<?php

namespace App\Block\Payment;

use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\CreatorAccess;
use App\Block\Action\Page;
use App\Block\Creator\Cursor;
use App\Entity\CashReceipt;
use App\Block\Payout\PayoutEligibilityBlock;
use App\Entity\CreatorProfile;
use App\Entity\LedgerEntry;
use App\Entity\Member;
use App\Entity\ParticipantAction;
use App\Entity\SettlementProfile;
use App\Entity\Payment;
use App\Entity\Payout;
use App\Identity\SecretFactory;
use App\Payment\LedgerAccount;
use App\Repository\CashReceiptRepository;
use App\Repository\LedgerEntryRepository;
use App\Repository\SettlementProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The financial ledger (architecture 14 and 62.5; TIS 9.3) and the creator's read-only views
 * of it (getOwnPendingBalance, listOwnLedgerEntries).
 *
 * A confirmed payment of gross G, provider fee F and platform fee P posts one journal:
 *
 *     PROVIDER_HELD_FUNDS   +G   ACTION_PAYMENT
 *     CREATOR_ENTITLEMENT   -G   ACTION_PAYMENT            creator sees +G
 *     CREATOR_ENTITLEMENT   +F   PAYMENT_PROCESSING_FEE    creator sees -F (the creator bears it, 13.1.1)
 *     PROVIDER_HELD_FUNDS   -F   PAYMENT_PROCESSING_FEE
 *     CREATOR_ENTITLEMENT   +P   PLATFORM_FEE              creator sees -P
 *     PLATFORM_FEE_REVENUE  -P   PLATFORM_FEE
 *
 * A full refund posts the compensating journal (14.1): each ACTION_PAYMENT and PLATFORM_FEE
 * line is reversed, the first as ACTION_REFUND, and each line names the one it reverses. No
 * platform fee is kept on a refunded payment (8.1). The processing fee is reversed only where
 * the provider returns it (PAYMENTS_REFUND_RETURNS_PROCESSING_FEE,
 * off by default): otherwise it stays with the creator as a negative entitlement, shown as `owed`.
 *
 * Cash paid in person (architecture 12.5.3 and 14; state-machines.md 10) posts memo journals
 * on accounts of their own, DIRECT_CASH_MEMO and DIRECT_CASH_ATTESTED: a confirmation posts
 * DIRECT_CASH_RECEIPT_CONFIRMED for the amount; a correction posts
 * CASH_RECEIPT_REVERSAL_OR_CORRECTION, reversing what was attested so far and attesting the
 * corrected amount. They carry no platform fee and no processing fee, and nothing that sums a
 * balance, a payout or a reconciliation reads those accounts.
 *
 * A zero amount is not posted (a zero platform fee posts no platform fee line). Each journal
 * has a key of its own and its lines a unique (journal, line) pair, so posting is exactly
 * once; the caller holds the Action's row lock.
 */
final readonly class LedgerBlock
{
    public function __construct(
        private LedgerEntryRepository $entries,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private CreatorAccess $access,
        private PaymentSettings $settings,
        private CashReceiptRepository $cashReceipts,
        private PayoutEligibilityBlock $eligibility,
        private SettlementProfileRepository $settlementProfiles,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function collectedJournal(Payment $payment): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function refundedJournal(Payment $payment): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function cashJournal(CashReceipt $receipt): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The memo of a confirmed original cash receipt. Once.
     */
    public function postCashConfirmed(CashReceipt $receipt): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The memo of a correction: what was attested so far for the original (its confirmation,
     * or the latest earlier correction) is reversed, and the corrected amount is attested.
     *
     * @param CashReceipt $previous the receipt whose attestation this one replaces
     */
    public function postCashCorrected(CashReceipt $correction, CashReceipt $previous): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param int $feesMinor the provider's processing fee for the payment, as the provider reported it
     *
     * @return bool false when the journal was already posted
     */
    public function postCollected(Payment $payment, int $feesMinor): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return bool false when the journal was already posted, or the payment was never collected
     */
    public function postRefunded(Payment $payment): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A chargeback or a refund made elsewhere: the provider reversed the payment without a
     * refund of ours. The same compensating journal as a refund, under its own key. After a
     * payout this leaves the creator's entitlement negative (`owed`), recovered from later
     * collections (architecture 13.1.1).
     *
     * @return bool false when the journal was already posted, or the payment was never collected
     */
    public function postReversed(Payment $payment): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function reversedJournal(Payment $payment): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function payoutJournal(Payout $payout, string $stage): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A payout is recorded (decision 26): its amount, and its fee when the creator bears it,
     * leave the creator's entitlement for "payout in transit". When FAKA bears the fee, it is
     * taken from the platform's fee revenue instead.
     *
     *     CREATOR_ENTITLEMENT   +A   CREATOR_PAYOUT     creator sees -A
     *     CREATOR_ENTITLEMENT   +F   PAYOUT_FEE         creator sees -F (or PLATFORM_FEE_REVENUE +F)
     *     PAYOUT_IN_TRANSIT     -A   CREATOR_PAYOUT
     *     PAYOUT_IN_TRANSIT     -F   PAYOUT_FEE
     */
    public function postPayoutRecorded(Payout $payout): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The provider paid the transfer: the amount and the fee leave FAKA's provider balance.
     */
    public function postPayoutPaid(Payout $payout): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The provider failed or reversed the transfer: the amount goes back to the creator's
     * entitlement (and a fee FAKA bore back to its revenue). Each line names the line it
     * reverses. If the payout had been paid, the money is back in FAKA's provider balance;
     * otherwise it leaves "payout in transit". Whether the provider keeps a fee on a reversed
     * transfer is not documented; the full fee is returned here, and balance reconciliation
     * shows a difference.
     */
    public function postPayoutReturned(Payout $payout): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The sum of a journal's lines: zero for every journal this Block posts.
     */
    public function journalBalance(string $journal): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema PendingBalance, derived from the ledger now. Nothing here is stored.
     *
     * Per currency, from PayoutEligibilityBlock (decision 26): `inCoolOff` is what is still in
     * the mandatory cool-off; `notYetEligible` is that, plus what waits for its Action's
     * fulfilment, plus what waits for a verified Settlement Profile; `held` is what a dispute,
     * an open refund or a payout hold after a change of destination blocks; `eligible` is
     * payable now; `processing` is in transit to the creator; `paidOut` is what the provider
     * paid (the payout fee included when the creator bears it); `owed` is zero or negative: a
     * refund or chargeback after a payout, recovered from later collections. `collected` is the
     * sum of the five non-negative figures.
     *
     * Cash is never in a balance (architecture 12.5.3 and 14.2): `cash` is reported apart, per
     * currency, from the cash receipts themselves: `confirmed` is what the creator attested
     * after corrections, `pendingConfirmation` what participants reported that is neither
     * confirmed nor voided.
     *
     * @return array{asOf: \DateTimeImmutable, payoutEligibilityState: string, balances: list<array<string, mixed>>, cash: list<array{currency: string, confirmed: int, pendingConfirmation: int}>}
     *
     * @throws ActionException CAPABILITY_REQUIRED
     */
    public function pendingBalance(Member $member): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's entitlement lines, most recent first. Platform and provider lines are
     * not the creator's and are never listed.
     *
     * @return Page<LedgerEntry>
     *
     * @throws ActionException CAPABILITY_REQUIRED or INVALID_CURSOR
     */
    public function listOwn(Member $member, ?string $entryType, ?bool $cashMemo, ?\DateTimeImmutable $from, ?\DateTimeImmutable $before, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
