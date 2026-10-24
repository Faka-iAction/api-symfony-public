<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Payment\PayoutStatus;
use App\Repository\PayoutRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One payout (decision 26): a transfer from FAKA's provider balance of a creator's payable
 * amount to the creator's verified destination. Its ledger journals (LedgerBlock) move the
 * amount from the creator's entitlement to "payout in transit" when it is recorded, out of
 * the provider balance when it is paid, and back to the entitlement when it fails or is
 * reversed.
 *
 * `reference` is the provider's idempotency key for the transfer: unique, lower case,
 * alphanumeric. A payout whose outcome is unknown is verified by it and never sent again.
 *
 * `amount_minor` is what is sent; `fee_minor` is the provider's transfer fee as configured;
 * when the creator bears the fee the entitlement is charged `amount_minor + fee_minor`
 * (`grossMinor()`), otherwise `amount_minor` and the fee comes from FAKA's fee revenue.
 */
#[ORM\Entity(repositoryClass: PayoutRepository::class)]
#[ORM\Table(name: 'payouts')]
#[ORM\UniqueConstraint(name: 'uniq_payouts_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_payouts_reference', columns: ['provider', 'reference'])]
#[ORM\Index(name: 'idx_payouts_status', columns: ['status', 'next_attempt_at'])]
#[ORM\Index(name: 'idx_payouts_creator', columns: ['creator_profile_id', 'status'])]
class Payout
{

    public function __construct(
        string $publicId,
        CreatorProfile $creatorProfile,
        SettlementProfile $settlementProfile,
        ?PayoutRun $payoutRun,
        string $provider,
        string $reference,
        int $amountMinor,
        int $feeMinor,
        bool $feeBorneByCreator,
        string $currency,
        \DateTimeImmutable $now,
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

    public function getCreatorProfile(): CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSettlementProfile(): SettlementProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayoutRun(): ?PayoutRun
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProvider(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReference(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRecipientCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAccountNumberLast4(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getBankName(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAmountMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFeeMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isFeeBorneByCreator(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** What the creator's entitlement is charged for this payout. */
    public function grossMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isFinal(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderStatus(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTransferCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFailureCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAttempts(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getNextAttemptAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getClaimToken(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getClaimedUntil(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastError(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubmittedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPaidAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReturnedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastVerifiedAt(): ?\DateTimeImmutable
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

    /** The provider accepted the transfer. */
    public function markProcessing(?string $transferCode, ?string $providerStatus, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markPaid(?string $transferCode, ?string $providerStatus, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $status PayoutStatus::FAILED or PayoutStatus::REVERSED
     */
    public function markReturned(string $status, string $failureCode, ?string $providerStatus, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The request may have reached the provider: it is verified, never sent again. */
    public function markUnknown(string $error, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Nothing was sent (no key, or the legal gate is closed): back to PENDING for a later round. */
    public function backToPending(string $error, \DateTimeImmutable $now, \DateTimeImmutable $next): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markVerified(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
