<?php

namespace App\Block\Settlement;

/**
 * The ways the Settlement Profile use cases can refuse. The entry point decides how each is
 * shown (the API controller, the web page); a Block knows no status codes.
 */
enum SettlementFailure
{
    /** Giving or changing payout details needs a recent sign-in (SETTLEMENT_STEP_UP_MAX_AGE). */
    case RECENT_SIGN_IN_REQUIRED;
    /** No supported payout rail for the member's country, or the profile is suspended. */
    case NOT_AVAILABLE;
    /** The provider refused the details (for example an unknown bank). Nothing was kept. */
    case DETAILS_REJECTED;
    /** The provider checked the account against the owner's document and could not verify it. Nothing was kept. */
    case DETAILS_NOT_VERIFIED;
    /** The provider is not configured, cannot be reached, or the legal gate refuses a live key. */
    case PROVIDER_UNAVAILABLE;
    /** Another change to the same profile won the race. */
    case CONFLICT;
    /** For operators: no such profile, or it is not waiting for a review. */
    case NOT_FOUND;
}
