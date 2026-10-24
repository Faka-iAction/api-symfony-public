<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\SettlementProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A member's payout eligibility and payout destination (architecture 62.3; decisions 26 and
 * 27). One per member (CONVENTIONS.md 12.5: it belongs to the member, not the creator profile).
 *
 * What is kept about the destination is deliberately little: the provider's transfer
 * recipient code (what a transfer is sent to), the bank's name, the last four digits of the
 * account number and the account holder's name. The full account number, the bank code and
 * any identity document number are never stored: they are passed to the provider when the
 * creator gives them and then dropped.
 *
 * `payout_eligibility_state` uses the canonical set: DESTINATION_PENDING (no destination
 * given), VERIFICATION_PENDING (given; waiting for verification), PAYOUT_ENABLED,
 * PAYOUT_SUSPENDED, and NO_ELIGIBLE_PAYEE and NOT_APPLICABLE (reserved, never written here).
 * `payout_hold_until` holds payouts after a change of destination even while PAYOUT_ENABLED.
 */
#[ORM\Entity(repositoryClass: SettlementProfileRepository::class)]
#[ORM\Table(name: 'settlement_profiles')]
#[ORM\UniqueConstraint(name: 'uniq_settlement_profiles_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_settlement_profiles_member', columns: ['member_id'])]
#[ORM\Index(name: 'idx_settlement_profiles_state', columns: ['payout_eligibility_state', 'id'])]
class SettlementProfile
{
    public const NO_ELIGIBLE_PAYEE = 'NO_ELIGIBLE_PAYEE';
    public const DESTINATION_PENDING = 'DESTINATION_PENDING';
    public const VERIFICATION_PENDING = 'VERIFICATION_PENDING';
    public const PAYOUT_ENABLED = 'PAYOUT_ENABLED';
    public const PAYOUT_SUSPENDED = 'PAYOUT_SUSPENDED';
    public const NOT_APPLICABLE = 'NOT_APPLICABLE';
    public const STATES = [self::NO_ELIGIBLE_PAYEE, self::DESTINATION_PENDING, self::VERIFICATION_PENDING, self::PAYOUT_ENABLED, self::PAYOUT_SUSPENDED, self::NOT_APPLICABLE];

    public const RAIL_BANK_ACCOUNT = 'BANK_ACCOUNT';

    /** Verified by the provider against the owner's identity or registration number. */
    public const VERIFIED_BY_PROVIDER = 'PROVIDER_VALIDATION';
    /** Verified by an operator (ADMIN_OPERATIONS) after a manual review. */
    public const VERIFIED_BY_MANUAL_REVIEW = 'MANUAL_REVIEW';

    public function __construct(string $publicId, Member $member, \DateTimeImmutable $now)
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

    public function getMember(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayoutEligibilityState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCountryCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRailType(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProvider(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRecipientCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getBankName(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAccountNumberLast4(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAccountHolderName(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVerificationMethod(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVerifiedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSuspendedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayoutHoldUntil(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDestinationChangedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function hasDestination(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Whether a payout may be made now: enabled, a destination, and no hold. */
    public function allowsPayoutAt(\DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A new bank account destination. It replaces any earlier one; the caller decides the
     * hold and whether it is verified already.
     */
    public function setBankDestination(
        string $countryCode,
        string $currency,
        string $provider,
        string $recipientCode,
        ?string $bankName,
        string $accountNumberLast4,
        string $accountHolderName,
        ?string $verificationMethod,
        ?\DateTimeImmutable $payoutHoldUntil,
        \DateTimeImmutable $now,
    ): void {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** An operator verified the destination after a manual review. */
    public function verifyByReview(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** An operator could not verify the destination: it is dropped, and a new one is needed. */
    public function rejectDestination(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
