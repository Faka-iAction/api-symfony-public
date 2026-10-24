<?php

namespace App\Outbox;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ProcessedEventRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Consumer idempotency (events/README.md, "Consumers are idempotent"; domain model 12.2).
 *
 * A consumer wraps its effect in once(): the processed_events row is inserted first, the
 * effect runs, and both commit in one transaction. A second delivery of the same event to
 * the same consumer finds the row and does nothing. Two deliveries at the same moment
 * cannot both pass: the second insert waits on the unique (consumer_name, event_id) key
 * until the first commits, then fails, and its effect never runs. If the effect throws,
 * the row is rolled back with it, so the event is not marked processed and a retry runs it.
 */
final readonly class ProcessedEvents
{
    public function __construct(
        private ProcessedEventRepository $processed,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string          $consumer a stable name for the consumer; renaming it makes it see every event again
     * @param callable(): void $effect   the consumer's work; anything it persists is flushed in the same transaction
     *
     * @return bool false when this consumer had already processed the event, and nothing was done
     */
    public function once(string $consumer, string $eventId, callable $effect): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function has(string $consumer, string $eventId): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
