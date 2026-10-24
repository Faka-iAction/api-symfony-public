<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\StateTransitionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One recorded state change, with actor, time, reason and correlation ID (domain model
 * 4.14, a proposal; state-machines.md 1.4 rule 1). Append-only. The unique entity version
 * means a replayed transition cannot be recorded twice.
 *
 * One table for every machine (OQ-20 is open); this slice records Creator Actions and
 * participant Actions.
 */
#[ORM\Entity(repositoryClass: StateTransitionRepository::class)]
#[ORM\Table(name: 'state_transitions')]
#[ORM\UniqueConstraint(name: 'uniq_state_transitions_entity_version', columns: ['entity_type', 'entity_id', 'entity_version'])]
class StateTransition
{
    public const ENTITY_CREATOR_ACTION = 'CREATOR_ACTION';
    public const ENTITY_PARTICIPANT_ACTION = 'PARTICIPANT_ACTION';
    /** An online payment (payments); its states are the canonical payment states. */
    public const ENTITY_PAYMENT = 'PAYMENT';

    public const ACTOR_MEMBER = 'MEMBER';
    public const ACTOR_GUEST = 'GUEST';
    public const ACTOR_SYSTEM = 'SYSTEM';

    public function __construct(
        string $entityType,
        int $entityId,
        ?string $fromState,
        string $toState,
        string $trigger,
        string $actorType,
        ?int $actorId,
        ?string $reason,
        string $correlationId,
        int $entityVersion,
        \DateTimeImmutable $occurredAt,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEntityType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEntityId(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFromState(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getToState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTrigger(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActorType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActorId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCorrelationId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEntityVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOccurredAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
