<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Entity\CreatorAction;
use App\Entity\ParticipantAction;
use App\Entity\StateTransition;
use App\Logging\CorrelationContext;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Applies a state change and records it in the state history with actor, time, reason
 * and correlation ID (state-machines.md 1.4, rule 1). Every transition of a Creator Action
 * or a participant Action goes through here, and a transition that the state machine does
 * not have is refused as a programming error: the Blocks decide what the client is told
 * before they get this far.
 *
 * Each transition also writes its domain event to the outbox (events/README.md: the event
 * is named after the target state), in the same transaction. The callers reach here only
 * once their decision is final, holding the row lock of the Creator Action or the Action,
 * so a refused or rolled-back change emits nothing.
 *
 * Nothing here flushes the change itself except to obtain a new entity's key; the caller's
 * transaction commits it.
 */
final class ActionHistory
{

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly CorrelationContext $correlation,
        private readonly Outbox $outbox,
        private readonly ClockInterface $clock,
        private readonly BidRankingBlock $bidRanking,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string|null $causationId the event that caused this transition, if one did
     *
     * @return string the ID of the event the transition emitted
     */
    public function moveCreatorAction(CreatorAction $action, string $to, string $trigger, Actor $actor, ?string $reason = null, ?string $causationId = null): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Records the first state of a new Creator Action (DRAFT, version 1).
     *
     * @return string the ID of the CreatorActionCreated event
     */
    public function recordCreatorActionCreated(CreatorAction $action, Actor $actor): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A new configuration version (decision 19). It is not a state change, so it is not in
     * the state history; the configuration row is its record.
     *
     * @return string the ID of the CreatorActionConfigChanged event
     */
    public function recordCreatorActionConfigChanged(CreatorAction $action): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Records the first state of a new participant Action (CREATED, version 1).
     *
     * @return string the ID of the ActionCreated event
     */
    public function recordParticipantCreated(ParticipantAction $action, Actor $actor): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string|null $causationId the event that caused this transition, if one did
     *
     * @return string the ID of the event the transition emitted
     */
    public function moveParticipant(ParticipantAction $action, string $to, string $trigger, Actor $actor, ?string $closeReason = null, ?string $reason = null, ?string $causationId = null): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
