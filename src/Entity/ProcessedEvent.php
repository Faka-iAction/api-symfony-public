<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ProcessedEventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * The record that one named consumer has handled one event (domain model 12.2), written
 * in the same transaction as the consumer's effect. The unique pair makes a second
 * delivery of the same event to the same consumer do nothing (ProcessedEvents).
 *
 * The event is referred to by its public event ID, not by a foreign key: a consumer may
 * receive an event whose outbox row has since been archived.
 */
#[ORM\Entity(repositoryClass: ProcessedEventRepository::class)]
#[ORM\Table(name: 'processed_events')]
#[ORM\UniqueConstraint(name: 'uniq_processed_events_consumer_event', columns: ['consumer_name', 'event_id'])]
#[ORM\Index(name: 'idx_processed_events_processed_at', columns: ['processed_at'])]
class ProcessedEvent
{

    public function __construct(string $consumerName, string $eventId, \DateTimeImmutable $processedAt)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConsumerName(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEventId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProcessedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
