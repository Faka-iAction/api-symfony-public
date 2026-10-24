<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\OutboxEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Reads the outbox and changes its delivery columns. Every change of a row's delivery
 * state is one conditional UPDATE whose WHERE clause holds the precondition, so the
 * database decides which of two workers wins: on InnoDB the UPDATE takes the row lock and
 * re-reads the committed row, and on SQLite writes are serialised. A caller learns
 * whether it won from the number of rows changed.
 *
 * There is no method that changes an envelope column or the payload, and none that
 * deletes a row.
 *
 * @extends ServiceEntityRepository<OutboxEvent>
 */
class OutboxEventRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByEventId(string $eventId): ?OutboxEvent
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The highest aggregate version stored for the aggregate, 0 when it has no event yet.
     * Rows this transaction has written are included; rows only persisted are not.
     */
    public function lastVersionOf(string $aggregateType, string $aggregatePublicId): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Keys of PENDING rows that are due and not leased, oldest first, and of each aggregate
     * only its earliest PENDING event: a later event of an aggregate is not published while
     * an earlier one is still waiting, so the events of one aggregate are published in
     * aggregate-version order however many workers run. A DEAD event does not hold back
     * the ones after it.
     *
     * @return list<int>
     */
    public function findClaimable(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Leases one row to the caller until $until. Fails when the row was published, went
     * dead, is not due, or another worker holds an unexpired lease on it.
     */
    public function claim(int $id, string $token, \DateTimeImmutable $now, \DateTimeImmutable $until): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The claimed row as the database holds it now, not as an earlier read of this entity
     * manager left it.
     */
    public function loadClaimed(int $id): ?OutboxEvent
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return bool false when the lease was lost (it expired and another worker took the row)
     */
    public function markPublished(int $id, string $token, \DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Counts a failed attempt and releases the lease: the row is retried from $nextAttemptAt,
     * or becomes DEAD when $dead.
     *
     * @return bool false when the lease was lost
     */
    public function recordFailure(int $id, string $token, string $error, \DateTimeImmutable $now, \DateTimeImmutable $nextAttemptAt, bool $dead): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many rows are in each delivery status; every status is listed, with 0 when none.
     *
     * @return array<string, int> status => count
     */
    public function countByStatus(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * DEAD events, oldest first.
     *
     * @return list<OutboxEvent>
     */
    public function findDead(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Puts DEAD events back to PENDING with a fresh attempt count, due at once. The last
     * error is kept for the record until the next attempt replaces it.
     *
     * @param list<string>|null $eventIds null for every DEAD event
     *
     * @return list<string> the event IDs that were requeued
     */
    public function requeueDead(?array $eventIds, \DateTimeImmutable $now): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
