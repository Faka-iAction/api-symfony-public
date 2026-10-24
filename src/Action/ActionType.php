<?php

namespace App\Action;

/**
 * Names used by the Creator Action and participation slice. Stored as strings, exactly
 * the canonical names of the contract and the domain model.
 */
final class ActionType
{
    public const REQUEST = 'REQUEST';
    public const VOTE = 'VOTE';
    public const BID = 'BID';
    public const SHOUT_OUT = 'SHOUT_OUT';
    public const TIP = 'TIP';
    public const ALL = [self::REQUEST, self::VOTE, self::BID, self::SHOUT_OUT, self::TIP];

    /** Types whose participant picks one of the creator's choices. */
    public const WITH_OPTIONS = [self::REQUEST, self::VOTE];
    /** Types with an acceptance and fulfilment step. */
    public const WITH_FULFILMENT = [self::REQUEST, self::BID, self::SHOUT_OUT];

    public const FREE = 'FREE';
    public const PAID = 'PAID';

    public const OPTIONS_FROM_ACTION = 'ACTION_OPTIONS';
    public const OPTIONS_FROM_PLAYLIST = 'PLAYLIST';

    public const DEADLINE_AT_ACTION_END = 'AT_ACTION_END';
    public const DEADLINE_AT_SESSION_END = 'AT_SESSION_END';
    public const DEADLINE_FIXED_PERIOD = 'FIXED_PERIOD_AFTER_PAYMENT';
    public const DEADLINE_RULES = [self::DEADLINE_AT_ACTION_END, self::DEADLINE_AT_SESSION_END, self::DEADLINE_FIXED_PERIOD];

    public const RANKING_HIGHEST_TOTAL_FIRST = 'HIGHEST_TOTAL_FIRST';
}
