<?php

namespace App\Outbox;

use App\Entity\OutboxEvent;
use App\Identity\SecretFactory;
use App\Logging\CorrelationContext;
use App\Privacy\SensitiveDataPolicy;
use App\Repository\OutboxEventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Records a domain event in the transactional outbox (architecture 23; events/README.md).
 *
 * record() only persists the row. It never flushes and never opens a transaction: the
 * caller's own flush writes it, inside the caller's transaction, together with the change
 * it records. A change that is rolled back therefore leaves no event, and an event exists
 * only for a change that was committed. The relay publishes it afterwards
 * (OutboxRelay), at least once.
 *
 * Call it where the decision is final: after every refusal has been decided, and inside
 * the locked section where the change has one.
 *
 * The aggregate version is the event's number among its aggregate's events: one more
 * than the highest stored, or persisted and not yet written, for the same aggregate. The
 * unique (aggregate_type, aggregate_public_id, aggregate_version) constraint is the guard:
 * two transactions that emit for one aggregate at the same moment cannot both commit, the
 * second fails on flush and is rolled back with its change. Blocks that hold the
 * aggregate's row lock while they emit never meet that case.
 */
final readonly class Outbox
{
    public const PRODUCER = 'api-symfony';

    public function __construct(
        private EntityManagerInterface $entityManager,
        private OutboxEventRepository $events,
        private SecretFactory $secrets,
        private CorrelationContext $correlation,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<string, mixed> $payload minimal and privacy-reviewed: public IDs, states, codes of
     *                                      enumerations; never a secret, token, hash or contact detail
     * @param string|null          $causationId the eventId of the event that directly caused this one;
     *                                          null when a request, a job or an operator caused it
     *
     * @return string the new event's ID
     *
     * @throws \LogicException when a name or the payload breaks the envelope's rules
     */
    public function record(
        string $eventType,
        string $aggregateType,
        string $aggregatePublicId,
        array $payload = [],
        ?string $causationId = null,
        int $schemaVersion = 1,
    ): string {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The aggregate ID of a follow: the member's and the creator's public IDs together. A
     * follow has no public ID of its own, and this pair is stable across unfollowing and
     * following again, so its events keep one version sequence.
     */
    public static function followId(string $memberPublicId, string $creatorPublicId): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
