<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

/**
 * The `main` firewall's authenticator. It reads no credential from any request: the web
 * sign-in controller proves who the member is through SignInBlock and then hands the member
 * to Security::login(), which needs an authenticator of the firewall to do so. Logging in
 * that way migrates the session (a new session ID) and stores the member in it.
 *
 * A bearer token is never looked at here; the web never reads one.
 */
final class WebSessionAuthenticator extends AbstractAuthenticator
{
    public function supports(Request $request): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function authenticate(Request $request): Passport
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
