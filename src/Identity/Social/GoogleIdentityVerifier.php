<?php

namespace App\Identity\Social;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Google sign-in with an ID token (decision 13; contract SocialCredential `id_token`).
 *
 * The token is verified by OidcIdTokenVerifier against Google's published keys, with the
 * issuer Google documents and this application's OAuth client IDs as the audience
 * (GOOGLE_SIGN_IN_CLIENT_IDS: the web, Android and iOS client IDs, comma-separated). Without
 * a client ID, Google sign-in stays unavailable, as before.
 *
 * An authorization code is not accepted yet: exchanging it needs the client secret and the
 * redirect URI, which no client uses so far (CONVENTIONS item 45).
 */
final readonly class GoogleIdentityVerifier implements ProviderVerifier
{
    public const JWKS_URL = 'https://www.googleapis.com/oauth2/v3/certs';
    public const ISSUERS = ['https://accounts.google.com', 'accounts.google.com'];

    public function __construct(
        private OidcIdTokenVerifier $idTokens,
        #[Autowire(env: 'default::GOOGLE_SIGN_IN_CLIENT_IDS')]
        ?string $clientIds,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function provider(): SocialProvider
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function verify(SocialCredentialType $type, string $credential, ?string $nonce): VerifiedSocialIdentity
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<string>
     */
    public static function list(?string $commaSeparated): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
