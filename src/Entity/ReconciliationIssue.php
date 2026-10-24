<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ReconciliationIssueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A difference between what the platform expects and what the provider says (architecture
 * 62.5; TIS 9.3: "mismatches are queued with severity, owner, aging and resolution
 * evidence"). Written by the notification inbox (a quarantined notification), the refund
 * worker (a refund that failed or whose outcome is unknown) and app:payments:reconcile.
 *
 * `dedup_key` is unique: the same difference found again by a later run is counted on the
 * existing row (`occurrences`, `last_seen_at`) instead of listed twice.
 *
 * An operator resolves an exception with a note of what was found and done (the admin
 * Payments page; audited). A resolved difference that a later run finds again is the same
 * row, reopened: the evidence stays in one place and the earlier note is in the audit log.
 */
#[ORM\Entity(repositoryClass: ReconciliationIssueRepository::class)]
#[ORM\Table(name: 'reconciliation_exceptions')]
#[ORM\UniqueConstraint(name: 'uniq_reconciliation_exceptions_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_reconciliation_exceptions_dedup', columns: ['dedup_key'])]
#[ORM\Index(name: 'idx_reconciliation_exceptions_status', columns: ['status', 'detected_at'])]
class ReconciliationIssue
{
    public const OPEN = 'OPEN';
    public const RESOLVED = 'RESOLVED';

    // Kinds.
    public const AMOUNT_MISMATCH = 'AMOUNT_MISMATCH';
    public const CURRENCY_MISMATCH = 'CURRENCY_MISMATCH';
    public const UNKNOWN_REFERENCE = 'UNKNOWN_REFERENCE';
    /** The provider and the platform disagree on whether the payment was collected. */
    public const STATE_MISMATCH = 'STATE_MISMATCH';
    /** The provider reports the transaction reversed (refunded or charged back) without a refund of ours. */
    public const UNEXPECTED_REVERSAL = 'UNEXPECTED_REVERSAL';
    /** The provider did not report its processing fee for a confirmed payment. */
    public const FEE_NOT_REPORTED = 'FEE_NOT_REPORTED';
    public const REFUND_FAILED = 'REFUND_FAILED';
    public const REFUND_OUTCOME_UNKNOWN = 'REFUND_OUTCOME_UNKNOWN';
    /** A notification kept failing and is DEAD. */
    public const NOTIFICATION_DEAD = 'NOTIFICATION_DEAD';

    // Payouts (decision 26).
    /** The provider refused a transfer outright; the amount went back to the entitlement. */
    public const PAYOUT_REJECTED = 'PAYOUT_REJECTED';
    /** A transfer request got no usable answer; it is verified, never sent again. */
    public const PAYOUT_OUTCOME_UNKNOWN = 'PAYOUT_OUTCOME_UNKNOWN';
    /** The provider failed or reversed a transfer; the amount went back to the entitlement. */
    public const PAYOUT_FAILED = 'PAYOUT_FAILED';
    /** The provider holds the transfer for an OTP: the transfer OTP setting must be off. */
    public const PAYOUT_OTP_REQUIRED = 'PAYOUT_OTP_REQUIRED';
    /** The provider and the platform disagree on a payout's outcome. */
    public const PAYOUT_STATUS_MISMATCH = 'PAYOUT_STATUS_MISMATCH';
    /** FAKA's provider balance differs from what the ledger says it holds. */
    public const BALANCE_MISMATCH = 'BALANCE_MISMATCH';
    /** FAKA's provider balance is less than what is owed to creators plus what is in transit. */
    public const BALANCE_SHORTFALL = 'BALANCE_SHORTFALL';

    public function __construct(
        string $publicId,
        string $kind,
        string $dedupKey,
        ?Payment $payment,
        ?ProviderNotification $notification,
        ?string $reference,
        ?int $expectedAmountMinor,
        ?string $expectedCurrency,
        ?int $reportedAmountMinor,
        ?string $reportedCurrency,
        ?string $providerStatus,
        \DateTimeImmutable $now,
        ?Payout $payout = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getKind(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDedupKey(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayment(): ?Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getNotification(): ?ProviderNotification
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayout(): ?Payout
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReference(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpectedAmountMinor(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpectedCurrency(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReportedAmountMinor(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReportedCurrency(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderStatus(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOccurrences(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDetectedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastSeenAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getResolvedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getResolutionNote(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Found again by a later run: counted, and reopened if it had been resolved.
     */
    public function seenAgain(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException unless it is OPEN, or without a note
     */
    public function resolve(string $note, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
