<?php

namespace App\Api;

/**
 * Route defaults that say how an API operation is protected. They are read after
 * routing, by the token authenticator and by the rate limit listener.
 */
final class ApiRoute
{
    /**
     * Marks an operation the contract declares with `security: []`. Every other route
     * under /api/ needs a valid access token: forgetting the mark closes an operation,
     * it never opens one.
     */
    public const PUBLIC = '_api_public';

    /**
     * Marks an operation that also falls under the stricter `api_authentication` limit:
     * registration, asking for a code, sign-in and token refresh.
     */
    public const AUTHENTICATION_LIMITED = '_api_authentication_limited';

    /**
     * Marks a participation, payment or participant status operation: it accepts a member's
     * bearer token or a guest token (CONVENTIONS.md 12.5 and 12.6). Without an Authorization
     * header the guest token decides; the controller resolves it.
     */
    public const PARTICIPANT = '_api_participant';

    /**
     * Marks guest-session creation and the participation operations, which fall under the
     * stricter `api_participation` limit (CONVENTIONS.md, section 10).
     */
    public const PARTICIPATION_LIMITED = '_api_participation_limited';

    public const PUBLIC_DEFAULTS = [self::PUBLIC => true];
    public const GUEST_SESSION_DEFAULTS = [self::PUBLIC => true, self::PARTICIPATION_LIMITED => true];
    public const PARTICIPANT_DEFAULTS = [self::PARTICIPANT => true];
    public const PARTICIPATION_DEFAULTS = [self::PARTICIPANT => true, self::PARTICIPATION_LIMITED => true];
    public const SIGN_IN_DEFAULTS = [self::PUBLIC => true, self::AUTHENTICATION_LIMITED => true];
}
