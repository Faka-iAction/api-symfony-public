<?php

namespace App\Action;

/**
 * State names of the two machines this slice drives (state-machines.md sections 2 to 7).
 */
final class ActionState
{
    // Creator Action configuration lifecycle.
    public const DRAFT = 'DRAFT';
    public const PUBLISHED = 'PUBLISHED';
    public const ACTIVE = 'ACTIVE';
    public const PAUSED = 'PAUSED';
    public const EXPIRED = 'EXPIRED';
    public const DISABLED = 'DISABLED';
    public const CREATOR_ACTION_STATES = [self::DRAFT, self::PUBLISHED, self::ACTIVE, self::PAUSED, self::EXPIRED, self::DISABLED];
    /** The only states the public ever sees. */
    public const PUBLIC_STATES = [self::PUBLISHED, self::ACTIVE, self::PAUSED];

    // Participant Action.
    public const CREATED = 'CREATED';
    public const INITIATED = 'INITIATED';
    public const SUBMITTED = 'SUBMITTED';
    public const ACCEPTED = 'ACCEPTED';
    public const FULFILLED = 'FULFILLED';
    public const COMPLETED = 'COMPLETED';
    public const REJECTED = 'REJECTED';
    public const CANCELLED = 'CANCELLED';
    public const FAILED = 'FAILED';
    public const PARTICIPANT_STATES = [
        self::CREATED, self::INITIATED, self::SUBMITTED, self::ACCEPTED, self::FULFILLED,
        self::COMPLETED, self::REJECTED, self::CANCELLED, self::EXPIRED, self::FAILED,
    ];
    /** Not fulfilled and not closed: what disabling a Creator Action cancels (decisions 6 and 18). */
    public const UNFULFILLED_OPEN = [self::CREATED, self::INITIATED, self::SUBMITTED, self::ACCEPTED];
    /** Counting and waiting for the creator: what the fulfilment deadline expires (decision 24). */
    public const AWAITING_FULFILMENT = [self::SUBMITTED, self::ACCEPTED];

    // Close reasons (ParticipantAction.closeReason, an open list).
    public const REASON_DEADLINE_EXPIRED = 'FULFILMENT_DEADLINE_EXPIRED';
    public const REASON_CREATOR_REJECTED = 'CREATOR_REJECTED';
    public const REASON_CREATOR_ACTION_DISABLED = 'CREATOR_ACTION_DISABLED';
    public const REASON_PARTICIPANT_CANCELLED = 'PARTICIPANT_CANCELLED';
    public const REASON_VOTING_CLOSED = 'VOTING_CLOSED';
}
