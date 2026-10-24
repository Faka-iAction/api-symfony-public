<?php

namespace App\Identity\Social;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Clock\ClockInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Verifies an OpenID Connect ID token the way the providers' documentation says a server must
 * (Google "Verify the integrity of the ID token"; Apple "Verifying a user"):
 *
 * - the signature, RS256 only, with a key from the provider's published key set (JWKS),
 *   picked by the token's `kid`; an unknown `kid` refetches the set once, for key rotation;
 * - `iss` is the provider; `aud` is one of this application's client IDs (configuration);
 * - `exp`, `iat` and `nbf`, with LEEWAY seconds of clock skew;
 * - `nonce`: when the client sent one, the token must carry it, as sent or as its SHA-256 in
 *   hex (Apple's native sign-in puts the hash in the token); when the token carries one, the
 *   client must have sent it;
 * - `sub` is present.
 *
 * The key set is cached in the app cache for the provider's max-age (an hour when it says
 * nothing, at most a day). A network failure or a key set that cannot be read is the
 * provider being unavailable, never a rejection of the member's credential.
 */
final readonly class OidcIdTokenVerifier
{
    public const LEEWAY = 60;

    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheItemPoolInterface $cache,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<string> $issuers   accepted `iss` values
     * @param list<string> $audiences this application's client IDs at the provider
     *
     * @return array<string, mixed> the token's claims, verified
     *
     * @throws SocialCredentialRejected  the token is not valid for this application
     * @throws SocialProviderUnavailable the key set cannot be had, or no client ID is configured
     */
    public function verify(string $token, ?string $nonce, string $jwksUrl, array $issuers, array $audiences): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
