<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\OutboxEventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A domain event, written in the same database transaction as the change it records, and
 * published afterwards by the relay (domain model 12.1; architecture 23; TIS 8.4, 12.1).
 *
 * The envelope columns (event_id to payload) are written once, on insert, and never
 * changed: there is no setter for them. Only the delivery columns change, and only
 * through OutboxEventRepository's conditional updates, so that a row claimed by one relay
 * worker cannot be published by another.
 *
 * - `aggregate_version` is the number of this event among the events of its aggregate,
 *   starting at 1. The unique constraint means two transactions can never give two events
 *   of one aggregate the same number: the second one fails and is rolled back.
 * - `status` is PENDING until the relay hands the event to Messenger (PUBLISHED), or gives
 *   up after the attempt limit (DEAD). A DEAD event is kept for an operator, who can put it
 *   back to PENDING (app:outbox:requeue).
 * - `claim_token` and `claimed_until` are a relay worker's lease on the row.
 */
#[ORM\Entity(repositoryClass: OutboxEventRepository::class)]
#[ORM\Table(name: 'outbox_events')]
#[ORM\UniqueConstraint(name: 'uniq_outbox_events_event_id', columns: ['event_id'])]
#[ORM\UniqueConstraint(name: 'uniq_outbox_events_aggregate_version', columns: ['aggregate_type', 'aggregate_public_id', 'aggregate_version'])]
#[ORM\Index(name: 'idx_outbox_events_status_id', columns: ['status', 'id'])]
#[ORM\Index(name: 'idx_outbox_events_correlation_id', columns: ['correlation_id'])]
class OutboxEvent
{
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_PUBLISHED = 'PUBLISHED';
    public const STATUS_DEAD = 'DEAD';

    /**
     * @param array<string, mixed> $payload
     */
    public function __construct(
        string $eventId,
        string $eventType,
        int $schemaVersion,
        string $aggregateType,
        string $aggregatePublicId,
        int $aggregateVersion,
        string $correlationId,
        ?string $causationId,
        string $producer,
        array $payload,
        \DateTimeImmutable $occurredAt,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEventId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEventType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSchemaVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAggregateType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAggregatePublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAggregateVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCorrelationId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCausationId(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProducer(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, mixed>
     */
    public function getPayload(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOccurredAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublishAttempts(): int
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

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastError(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDeadAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The event as envelope.schema.json describes it: exactly its eleven fields.
     *
     * @return array{eventId: string, eventType: string, schemaVersion: int, aggregateType: string, aggregateId: string, aggregateVersion: int, occurredAt: string, correlationId: string, causationId: string|null, producer: string, payload: array<string, mixed>|object}
     */
    public function toEnvelope(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
