<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Payment\PaymentState;
use App\Repository\PaymentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One online payment of a participant Action (domain model: payment intent and its provider
 * attempt; architecture 13.2 and 13.3). Its state is the canonical payment state, kept
 * apart from the Action's state (architecture 8 and 62.7).
 *
 * - The amount is the server's, copied from the Action when the payment is made; a client
 *   never sends it (CONVENTIONS.md 4).
 * - `provider_reference` is the platform's own reference, sent to the provider and unique:
 *   a notification or a verify answer is matched to a payment by it, and only by it.
 * - `open_action_id` holds the Action's key while the payment is CREATED or PENDING and is
 *   NULL otherwise, under a unique index: at most one open payment per Action is a database
 *   rule, not only a check (createPayment, PAYMENT_ALREADY_IN_PROGRESS).
 * - `platform_fee_basis_points` is the fee policy at the time the payment was made, so that a
 *   later change of the rate does not change what this payment books.
 *
 * Fees are not shown to the payer (contract Payment: "no fee information and no provider
 * reference"); they are booked on the ledger when the payment is confirmed.
 */
#[ORM\Entity(repositoryClass: PaymentRepository::class)]
#[ORM\Table(name: 'payments')]
#[ORM\UniqueConstraint(name: 'uniq_payments_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_payments_provider_reference', columns: ['provider', 'provider_reference'])]
#[ORM\UniqueConstraint(name: 'uniq_payments_open_action', columns: ['open_action_id'])]
#[ORM\Index(name: 'idx_payments_state_expires', columns: ['state', 'expires_at'])]
#[ORM\Index(name: 'idx_payments_action', columns: ['participant_action_id', 'id'])]
class Payment
{

    public function __construct(
        string $publicId,
        ParticipantAction $participantAction,
        string $method,
        string $provider,
        string $providerReference,
        int $amountMinor,
        string $currency,
        int $platformFeeBasisPoints,
        string $checkoutUrl,
        \DateTimeImmutable $expiresAt,
        \DateTimeImmutable $now,
        string $purpose = PaymentState::PURPOSE_INITIAL,
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

    public function getParticipantAction(): ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPurpose(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isBidRaise(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getMethod(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProvider(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderReference(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderTransactionId(): ?string
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

    public function getPlatformFeeBasisPoints(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOpenActionId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLockVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStateVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isOpen(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCheckoutUrl(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpiresAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConfirmedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFailureCode(): ?string
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

    /**
     * Only through PaymentStateMachine, which records the move.
     *
     * @return int the new state version
     */
    public function moveTo(string $state, \DateTimeImmutable $now, ?string $failureCode = null): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function recordProviderTransaction(?string $providerTransactionId): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markVerified(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
