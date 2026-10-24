<?php

namespace App\Block\Identity;

/**
 * The ways an identity use case can refuse. The entry point (API or web) decides how
 * each one is shown; a Block does not know about status codes.
 */
enum IdentityFailure
{
    /** Sign-in failed. One value for every cause, on purpose. */
    case INVALID_CREDENTIALS;
    case REFRESH_TOKEN_INVALID;
    case ACCESS_TOKEN_INVALID;
    case ACCESS_TOKEN_EXPIRED;
    /** A signed-in member presented a code or provider credential that could not be verified. */
    case VERIFICATION_FAILED;
    case IDENTIFIER_NOT_AVAILABLE;
    case LAST_IDENTIFIER;
    case IDENTIFIER_NOT_FOUND;
    /** Another code was asked for the same identifier before the resend interval had passed. */
    case CODE_REQUESTED_TOO_SOON;
    /** A social login provider is not configured on this server or cannot be reached. */
    case PROVIDER_UNAVAILABLE;
    case INVALID_CURSOR;
}
