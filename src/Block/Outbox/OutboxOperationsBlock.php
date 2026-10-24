<?php

namespace App\Block\Outbox;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\OutboxEvent;
use App\Repository\OutboxEventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * What an operator sees of the outbox and the one thing they may do to it: put dead events
 * back in the queue (architecture 23.1: dead-letter handling). Used by the console commands
 * (app:outbox:dead, app:outbox:requeue) and the admin outbox page alike.
 *
 * A requeue is the repository's conditional UPDATE from DEAD to PENDING, with a fresh
 * attempt count; each event requeued is recorded in the audit log in the same transaction.
 * The events themselves are not changed, so a consumer that already handled one skips it.
 */
final readonly class OutboxOperationsBlock
{
    public function __construct(
        private OutboxEventRepository $events,
        private AuditLogBlock $audit,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, int> status => count, every status listed
     */
    public function counts(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<OutboxEvent> oldest first
     */
    public function dead(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<string>|null $eventIds null for every dead event
     * @param string|null       $reason   an operator's reason, kept with each audit entry
     *
     * @return list<string> the event IDs that were requeued; one that was not dead is skipped
     */
    public function requeue(?array $eventIds, AuditActor $actor, ?string $reason = null): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
