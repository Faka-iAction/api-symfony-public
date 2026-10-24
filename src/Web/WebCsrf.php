<?php

namespace App\Web;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

/**
 * The session-based CSRF tokens of the sign-in forms and the signed-in pages. Each is a
 * random value kept in the visitor's server-side session (config/packages/framework.yaml
 * lists only the guest participation form as stateless). Every form sends it as `_token`.
 */
final readonly class WebCsrf
{
    /** The sign-in forms: code, password. */
    public const SIGN_IN = 'web_sign_in';
    public const SIGN_OUT = 'web_sign_out';
    /** Every form of the signed-in pages. */
    public const MEMBER = 'web_member';
    /** Every form of the admin pages: a token of its own, never accepted by a member form. */
    public const ADMIN = 'web_admin';

    public const FIELD = '_token';

    public function __construct(private CsrfTokenManagerInterface $tokens)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isValid(Request $request, string $tokenId): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
