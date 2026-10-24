<?php

namespace App\Block\Payout;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Payment\LedgerBlock;
use App\Block\Payment\PaymentSettings;
use App\Block\Payment\ReconciliationIssues;
use App\Entity\CreatorProfile;
use App\Entity\Payout;
use App\Entity\PayoutRun;
use App\Entity\ProviderNotification;
use App\Entity\ReconciliationIssue;
use App\Entity\SettlementProfile;
use App\Identity\SecretFactory;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Payment\PayoutStatus;
use App\Payment\Provider\PayoutProvider;
use App\Payment\Provider\PayoutsNotApproved;
use App\Payment\Provider\ProviderEvent;
use App\Payment\Provider\ProviderException;
use App\Payment\Provider\ProviderNotConfigured;
use App\Payment\Provider\ProviderOutcomeUnknown;
use App\Payment\Provider\ProviderRejected;
use App\Payment\Provider\ProviderTransfer;
use App\Payment\Provider\TransactionNotFound;
use App\Payment\Provider\TransferRequest;
use App\Repository\CreatorProfileRepository;
use App\Repository\PayoutRepository;
use App\Repository\SettlementProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;

/**
 * Payouts (decision 26): paying creators their payable amount from FAKA's provider balance.
 *
 * A run (run(), from app:payouts:run) first checks the legal gate: with a live provider key
 * and PAYOUTS_LIVE_APPROVED off, nothing is recorded or sent, and the attempt is logged and
 * audited. Otherwise, for each creator whose Settlement Profile allows a payout now, under
 * the creator profile's row lock: when no payout of theirs is still in flight and the
 * payable amount (PayoutEligibilityBlock) is at least PAYOUTS_MINIMUM_MINOR, one payout is
 * recorded with its journal (the amount leaves the entitlement for "payout in transit").
 * Running twice pays once: the second run finds the payout in flight, and after it is paid
 * the amount is no longer in the entitlement.
 *
 * Sending (sendDue()) takes each PENDING payout with a committed lease (SENDING) and only then
 * asks the provider for the transfer, with the payout's reference as the idempotency key:
 *
 * - accepted: PROCESSING (or PAID, FAILED, REVERSED when the provider says so at once);
 * - a definite refusal: FAILED, the amount back in the entitlement, listed for an operator;
 * - no usable answer: UNKNOWN. Never sent again: reconcileUnknown() verifies it by reference,
 *   and the transfer notification settles it. A worker that died while sending leaves it
 *   SENDING; once the lease runs out it is treated as UNKNOWN.
 * - no key, or the gate closed: back to PENDING, nothing sent (the gate's refusal audited).
 *
 * Settling: transfer.success makes it PAID (the money leaves the provider balance);
 * transfer.failed and transfer.reversed return the amount to the entitlement. Notifications
 * arrive through the provider notification inbox (signature, dedup, retry, quarantine on a
 * mismatch of reference, amount or currency).
 *
 * No admin or web path moves money: an operator can only ask for a payout to be verified
 * again (retryVerification()).
 */
final readonly class PayoutBlock
{

    public function __construct(
        private PayoutRepository $payouts,
        private SettlementProfileRepository $settlementProfiles,
        private CreatorProfileRepository $creatorProfiles,
        private PayoutEligibilityBlock $eligibility,
        private LedgerBlock $ledger,
        private PayoutProvider $provider,
        private PayoutSettings $settings,
        private PaymentSettings $paymentSettings,
        private ReconciliationIssues $issues,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private SecretFactory $secrets,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Records the payouts that are due and sends them.
     *
     * @return array{run: string, status: string, considered: int, created: int, amountMinor: int, sent: int, failed: int, unknown: int, retried: int}
     */
    public function run(string $triggeredBy): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The worker's round (app:payouts:process): payouts whose outcome is unknown are
     * verified, and every PENDING payout that is due is sent.
     *
     * @return array{settled: int, sent: int, failed: int, unknown: int, retried: int}
     */
    public function processDue(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{sent: int, failed: int, unknown: int, retried: int}
     */
    public function sendDue(int $limit = self::BATCH): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Sends one payout, if it is PENDING and due and no other worker holds it.
     *
     * @return 'sent'|'failed'|'unknown'|'retried'|null null when nothing was sent
     */
    public function send(int $payoutId): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Payouts whose outcome at the provider is not known: a SENDING one whose lease ran out
     * becomes UNKNOWN; every UNKNOWN or PROCESSING one is verified by its reference. Nothing
     * is ever sent again from here.
     *
     * @return int how many reached a final state
     */
    public function reconcileUnknown(int $limit = self::BATCH): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An operator's "retry verification" (ADMIN_OPERATIONS): asks the provider about the
     * payout now and applies a definite answer. It never sends anything.
     *
     * @return string what happened: the payout's status afterwards, NOT_FOUND_AT_PROVIDER, PROVIDER_UNAVAILABLE or LEGAL_GATE
     */
    public function retryVerification(string $payoutId, AuditActor $operator): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A transfer notification from the inbox, already signature-checked and stored. Returns
     * the outcome for the inbox, or a reconciliation kind for the inbox to quarantine it with.
     *
     * @return array{string, Payout|null, bool} the outcome or mismatch kind, the payout, and whether it is a mismatch
     */
    public function applyNotification(ProviderNotification $notification): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A destination was replaced: payouts recorded for the old one and not yet sent are
     * returned to the entitlement, to be paid to the new one after the hold. The caller holds
     * the settlement profile's lock and commits.
     */
    public function returnUnsent(SettlementProfile $settlement, string $oldRecipientCode): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The provider's idempotency key for the transfer: lower case and alphanumeric, at least
     * 16 characters (Paystack: "Single transfers"), derived from the payout's own public ID.
     */
    public static function reference(string $payoutPublicId): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
