<?php

namespace App\Outbox;

use App\Repository\OutboxEventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Publishes outbox rows as Messenger messages (DomainEventMessage) and marks them
 * PUBLISHED. Run by app:outbox:relay; it holds no state between calls, so a scheduler or a
 * Messenger handler could call relay() the same way.
 *
 * Several workers can run at once. A worker leases each row before it publishes it, with
 * one conditional UPDATE (OutboxEventRepository::claim()): of two workers that want the
 * same row only one changes it, and the other moves on. A lease expires after
 * OUTBOX_CLAIM_LEASE seconds, so a row whose worker died is taken up again.
 *
 * Order: rows are read oldest first, and a later event of an aggregate is not read while
 * an earlier one of the same aggregate is still PENDING, so the events of one aggregate are
 * published in aggregate-version order. There is no order between aggregates.
 *
 * Delivery is AT LEAST ONCE. The message is dispatched before the row is marked: a crash
 * between the two, or a lease that expires while a dispatch hangs, publishes the event
 * again. Consumers deduplicate by eventId (ProcessedEvents).
 *
 * A failed dispatch is retried with exponential backoff and jitter, up to
 * OUTBOX_MAX_ATTEMPTS attempts in all; then the row is DEAD and stays for an operator
 * (app:outbox:dead, app:outbox:requeue). It is never dropped.
 */
final readonly class OutboxRelay
{
    public function __construct(
        private OutboxEventRepository $events,
        private EntityManagerInterface $entityManager,
        private MessageBusInterface $bus,
        private ClockInterface $clock,
        private LoggerInterface $logger,
        #[Autowire(env: 'int:OUTBOX_MAX_ATTEMPTS')]
        private int $maxAttempts,
        #[Autowire(env: 'int:OUTBOX_RETRY_BASE_DELAY')]
        private int $baseDelay,
        #[Autowire(env: 'int:OUTBOX_RETRY_MAX_DELAY')]
        private int $maxDelay,
        #[Autowire(env: 'int:OUTBOX_CLAIM_LEASE')]
        private int $leaseSeconds,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Reads and publishes batches until a batch finds nothing due, or $maxBatches were read.
     */
    public function relay(int $batchSize = 100, int $maxBatches = 100): RelayReport
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One batch: the due rows, each claimed, published and marked in turn.
     */
    public function relayBatch(int $batchSize = 100): RelayReport
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Seconds before attempt $attempt + 1: base * 2^(attempt - 1), capped, plus up to a
     * quarter of it at random so that failed rows do not all come back at once.
     */
    public function backoff(int $attempt): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
