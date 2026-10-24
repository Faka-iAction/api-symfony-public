<?php

namespace App\Block\Action;

/**
 * The ways a Creator Action, playlist, guest or participation use case can refuse. The
 * entry point decides how each is shown (ActionExceptionListener); a Block knows no status codes.
 */
enum ActionFailure
{
    /** The member does not hold the CREATOR capability (or has no creator profile). */
    case CAPABILITY_REQUIRED;
    /** The caller may not do this: for cash, only the owner of a self-managed profile acts. */
    case FORBIDDEN;
    /** A field of the request breaks a rule; the exception names the fields. */
    case INVALID_INPUT;
    /** A filter value of a list operation is not valid; the exception names the parameter. */
    case INVALID_FILTER;
    case INVALID_CURSOR;
    case CREATOR_NOT_FOUND;

    case CREATOR_ACTION_NOT_FOUND;
    case CREATOR_ACTION_STATE_CONFLICT;
    /** The configuration is incomplete or breaks a publish rule; the exception names the fields. */
    case CREATOR_ACTION_NOT_PUBLISHABLE;
    case ACTION_SLUG_TAKEN;
    case OPTION_NOT_FOUND;
    case OPTION_IN_USE;
    case PLAYLIST_NOT_FOUND;
    case PLAYLIST_ITEM_NOT_FOUND;
    case PLAYLIST_NAME_TAKEN;
    case PLAYLIST_IN_USE;

    case GUEST_TOKEN_INVALID;
    case GUEST_NOT_ALLOWED;
    case CREATOR_ACTION_NOT_OPEN;
    case ACTION_CONFIG_CHANGED;
    case PARTICIPATION_LIMIT_REACHED;
    case OPTION_UNAVAILABLE;
    case ACTION_NOT_FOUND;
    case ACTION_STATE_CONFLICT;
    case ACTION_NOT_CANCELLABLE;
    /** No payment provider is configured: a paid submission cannot go ahead and nothing is created. */
    case PAYMENT_PROVIDER_UNAVAILABLE;
    /** The Action needs no payment now: it is free, already paid, or closed. */
    case ACTION_NOT_PAYABLE;
    /** Another payment for the Action is open, or its outcome is not known yet. */
    case PAYMENT_ALREADY_IN_PROGRESS;
    /** The method is not offered for this Action now. */
    case PAYMENT_METHOD_NOT_AVAILABLE;
    case PAYMENT_NOT_FOUND;
    /** The payment has never been confirmed, so it has no receipt. */
    case RECEIPT_NOT_AVAILABLE;
    /** The amount is over a platform transaction limit (the country's maximum). The limit is not disclosed. */
    case TRANSACTION_LIMIT_EXCEEDED;

    /** The bid is not ranked, or its Creator Action is not open: it cannot be raised now. */
    case BID_NOT_RAISABLE;
    /** Cash in person cannot be used for this Action: a Bid, a free Action, cash not enabled, or a profile that is not self-managed. */
    case CASH_NOT_AVAILABLE;
    case CASH_RECEIPT_NOT_FOUND;
    /** The cash receipt cannot make this change from its current state, or a pending cash report blocks an online payment. */
    case CASH_RECEIPT_STATE_CONFLICT;

    /** The creator's country is not ACTIVE: no new Creator Action can be made in it (architecture 16). */
    case COUNTRY_NOT_AVAILABLE;
    /** A policy control declined the participation: the creator's country is not ACTIVE. No reason is given to the participant. */
    case PARTICIPATION_DECLINED;
}
