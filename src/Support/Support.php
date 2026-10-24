<?php

namespace App\Support;

/**
 * Names and limits of support tickets (domain model 10.7 and 10.8; architecture 29).
 * Stored as strings, exactly these names.
 */
final class Support
{
    // Ticket states (architecture 29). WAITING_FOR_CREATOR is in the model; the web flow does
    // not use it yet, because no ticket is routed to a creator in MVP1.
    public const OPEN = 'OPEN';
    public const IN_PROGRESS = 'IN_PROGRESS';
    public const WAITING_FOR_MEMBER = 'WAITING_FOR_MEMBER';
    public const WAITING_FOR_CREATOR = 'WAITING_FOR_CREATOR';
    public const RESOLVED = 'RESOLVED';
    public const CLOSED = 'CLOSED';
    public const STATES = [self::OPEN, self::IN_PROGRESS, self::WAITING_FOR_MEMBER, self::WAITING_FOR_CREATOR, self::RESOLVED, self::CLOSED];
    /** States in which the person who asked can still write. */
    public const REPLYABLE = [self::OPEN, self::IN_PROGRESS, self::WAITING_FOR_MEMBER, self::WAITING_FOR_CREATOR, self::RESOLVED];
    /** States support may set by hand. */
    public const SUPPORT_SETTABLE = [self::IN_PROGRESS, self::WAITING_FOR_MEMBER, self::RESOLVED, self::CLOSED];

    // Who wrote a message (domain model 10.8). CREATOR is in the model and unused so far.
    public const AUTHOR_MEMBER = 'MEMBER';
    public const AUTHOR_GUEST = 'GUEST';
    public const AUTHOR_SUPPORT = 'SUPPORT';

    /** Categories the person picks from; the label is what they see. Placeholder list. */
    public const CATEGORIES = [
        'PAYMENT' => 'A payment or a refund',
        'ACTION' => 'A request, vote, shout-out, bid or tip',
        'ACCOUNT' => 'Signing in or my account',
        'CREATOR' => 'Being a creator',
        'OTHER' => 'Something else',
    ];

    public const SUBJECT_MAX_LENGTH = 200;
    public const BODY_MAX_LENGTH = 4000;
}
