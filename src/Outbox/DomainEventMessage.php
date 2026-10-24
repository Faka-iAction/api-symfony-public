<?php

namespace App\Outbox;

/**
 * A published domain event, as the Messenger message the relay dispatches. It carries the
 * envelope exactly as envelope.schema.json describes it, nothing more, so a consumer in any
 * runtime sees the same thing.
 *
 * Delivery is at least once: the same eventId can arrive more than once, and a consumer
 * must apply it at most once (ProcessedEvents).
 */
final readonly class DomainEventMessage
{
    /**
     * @param array{eventId: string, eventType: string, schemaVersion: int, aggregateType: string, aggregateId: string, aggregateVersion: int, occurredAt: string, correlationId: string, causationId: string|null, producer: string, payload: array<string, mixed>|object} $envelope
     */
    public function __construct(public array $envelope)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function eventId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function eventType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function schemaVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
