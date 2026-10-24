<?php

namespace App\Security;

use App\Api\ApiRoute;
use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Block\Identity\IdentityException;
use App\Block\Identity\IdentityFailure;
use App\Block\Identity\SessionBlock;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

/**
 * Resolves `Authorization: Bearer <access token>` to the member, on the stateless `api`
 * firewall. A web session is never accepted here (CONVENTIONS.md, section 12.1).
 *
 * It runs for every route under /api/ that is not marked public, with or without a
 * header, so a protected operation cannot be reached anonymously. A public operation
 * ignores the header: a client that still attaches an expired access token to
 * refreshToken must not be refused for it.
 */
final class ApiTokenAuthenticator extends AbstractAuthenticator
{
    public const GUEST_HEADER = 'X-Guest-Token';

    public function __construct(private readonly SessionBlock $sessions)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A participant operation called with a guest token and no Authorization header is left
     * to the controller, which resolves the guest. With an Authorization header the bearer
     * token decides, and the guest token is ignored (CONVENTIONS.md 12.6).
     */
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

    /**
     * Thrown rather than returned, so that the one place that builds the error envelope
     * (ApiExceptionListener) also builds this one.
     *
     * The authentication exception is deliberately not chained as the previous one: the
     * firewall searches the chain for one and would answer it itself, with a plain 401
     * that loses the difference between an invalid and an expired token.
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): never
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
