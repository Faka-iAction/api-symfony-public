<?php

namespace App\Block\Creator;

/**
 * The ways a creator, discovery, follow or QR use case can refuse. The entry point
 * decides how each one is shown; a Block does not know about status codes.
 */
enum CreatorFailure
{
    /** The member already has a creator profile (one per member in MVP1, decisions 12 and 15). */
    case PROFILE_EXISTS;
    /** The handle is another creator's current handle, or a former one reserved for them. */
    case HANDLE_TAKEN;
    /** The caller has no creator profile. */
    case PROFILE_NOT_FOUND;
    /** No publicly visible creator matches. Unknown and hidden are not told apart. */
    case CREATOR_NOT_FOUND;
    /** A category code in a request body that is not an active category. */
    case UNKNOWN_CATEGORY;
    /** A country code in a request body that is not a country the platform knows. */
    case UNKNOWN_COUNTRY;
    /** A country the platform knows but that is not ACTIVE: nothing new can be made in it. */
    case COUNTRY_NOT_AVAILABLE;
    /** A category code in a search filter that is not an active category. */
    case UNKNOWN_CATEGORY_FILTER;
    case INVALID_CURSOR;
    /** The QR identifier is unknown or malformed. The two are not told apart. */
    case QR_NOT_FOUND;
}
