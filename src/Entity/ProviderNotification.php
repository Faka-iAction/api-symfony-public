<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ProviderNotificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * The inbox of signed payment-provider notifications (TIS 8.4 and 14.3; architecture 43.3).
 *
 * A notification is written here, once, before the provider is told it was received: the
 * unique (provider, dedup_key) makes a second delivery of the same notification find the
 * first row instead of making another. It is processed afterwards, by a worker, at least
 * once; the processing itself is idempotent.
 *
 * Only the fields the platform acts on are kept, never the raw body, which carries the
 * payer's details.
 *
 * `status`: RECEIVED (waiting, or waiting for a retry after a failure), PROCESSED, IGNORED
 * (a kind the platform does not act on), QUARANTINED (it disagrees with the payment it names:
 * amount, currency or an unknown reference; see reconciliation_exceptions) or DEAD (it kept
 * failing; an operator looks at it).
 */
#[ORM\Entity(repositoryClass: ProviderNotificationRepository::class)]
#[ORM\Table(name: 'payment_provider_events')]
#[ORM\UniqueConstraint(name: 'uniq_payment_provider_events_dedup', columns: ['provider', 'dedup_key'])]
#[ORM\Index(name: 'idx_payment_provider_events_status_next', columns: ['status', 'next_attempt_at'])]
class ProviderNotification
{
    public const RECEIVED = 'RECEIVED';
    public const PROCESSED = 'PROCESSED';
    public const IGNORED = 'IGNORED';
    public const QUARANTINED = 'QUARANTINED';
    public const DEAD = 'DEAD';

    public function __construct(
        string $provider,
        string $dedupKey,
        string $kind,
        string $providerEventType,
        ?string $reference,
        ?int $amountMinor,
        ?string $currency,
        ?int $feesMinor,
        ?string $providerTransactionId,
        \DateTimeImmutable $now,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProvider(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDedupKey(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getKind(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderEventType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReference(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAmountMinor(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFeesMinor(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderTransactionId(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOutcome(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDeliveries(): int
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

    public function getLastError(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReceivedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProcessedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function finish(string $status, ?string $outcome, \DateTimeImmutable $now): void
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
}
