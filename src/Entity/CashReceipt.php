<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CashReceiptRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cash paid in person, directly to the creator (architecture 12.5.3, 12.5.3.1 and 13.4.1;
 * TIS 9.4; state-machines.md section 10; domain table `cash_receipts`). It is the creator's
 * attestation: FAKA does not collect, hold, settle or refund the cash, so this is not a
 * payment, never in a balance, never in a payout, and never reconciled with a provider.
 *
 * - Exactly two states: CASH_REPORTED_PENDING_CREATOR_CONFIRMATION and
 *   CASH_CONFIRMED_BY_CREATOR. A pending receipt that the creator declines is voided
 *   (`voided_at`) without changing its state (DN-27).
 * - The platform fee and the processing fee are stored, and are always zero: a fixed product
 *   rule (architecture 13.4.1), enforced here, not a setting.
 * - One original receipt per Action: `original_action_id` holds the Action's key on an
 *   original receipt and is NULL on a correction, under a unique index.
 * - A confirmed receipt is never edited or deleted. A correction is a new receipt that names
 *   the one it corrects (`corrects_cash_receipt_id`) with a reason; the original stays as it is.
 * - Only the member who owns the self-managed recipient profile confirms, voids or corrects
 *   (the Block checks it); who did it and when is kept here and in the audit log.
 */
#[ORM\Entity(repositoryClass: CashReceiptRepository::class)]
#[ORM\Table(name: 'cash_receipts')]
#[ORM\UniqueConstraint(name: 'uniq_cash_receipts_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_cash_receipts_original_action', columns: ['original_action_id'])]
#[ORM\Index(name: 'idx_cash_receipts_recipient', columns: ['recipient_creator_profile_id', 'state', 'id'])]
class CashReceipt
{
    public const REPORTED = 'CASH_REPORTED_PENDING_CREATOR_CONFIRMATION';
    public const CONFIRMED = 'CASH_CONFIRMED_BY_CREATOR';
    public const STATES = [self::REPORTED, self::CONFIRMED];

    /** The payment method code of cash in person (contract PaymentMethodCode). */
    public const METHOD = 'CASH_IN_PERSON';

    /**
     * The participant says they are paying cash: pending until the creator confirms.
     */
    public static function report(string $publicId, ParticipantAction $action, \DateTimeImmutable $now): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A compensating record for a confirmed receipt: the amount the creator now attests was
     * actually received (zero when none was). It is confirmed by the same act.
     */
    public static function correction(string $publicId, self $original, Member $creator, int $amountMinor, string $reason, \DateTimeImmutable $now): self
    {
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

    /** The Action's key on an original receipt; null on a correction. */
    public function getOriginalActionId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLockVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getParticipantAction(): ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorAction(): CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRecipientCreatorProfile(): CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAmountMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPlatformFeeMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProcessingFeeMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReportedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConfirmedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConfirmedByMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getNote(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVoidedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVoidedByMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCorrectsCashReceipt(): ?CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCorrectionReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isConfirmed(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isVoided(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isPending(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isCorrection(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The owning creator attests receipt. Only from pending.
     */
    public function confirm(Member $creator, ?string $note, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The cash was not received (or the participant withdrew before paying): the receipt is
     * closed without a third state. Only from pending.
     */
    public function void(?Member $by, ?string $note, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
