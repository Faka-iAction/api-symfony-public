<?php

namespace App\Identity\Social;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Sign in with Apple with an identity token (decision 13; contract SocialCredential
 * `id_token`).
 *
 * The token is verified by OidcIdTokenVerifier against Apple's published keys, with Apple as
 * the issuer and this application's identifiers as the audience (APPLE_SIGN_IN_CLIENT_IDS:
 * the app's bundle ID and the web Services ID, comma-separated). Without one, Sign in with
 * Apple stays unavailable, as before.
 *
 * Apple's token never carries the person's name, and its email may be a private relay
 * address; both are what Apple vouches for. `email_verified` arrives as the string "true" or
 * as a boolean. An authorization code is not accepted yet (it needs the client-secret JWT
 * signed with the team's key; CONVENTIONS item 45).
 */
final readonly class AppleIdentityVerifier implements ProviderVerifier
{
    public const JWKS_URL = 'https://appleid.apple.com/auth/keys';
    public const ISSUERS = ['https://appleid.apple.com'];

    public function __construct(
        private OidcIdTokenVerifier $idTokens,
        #[Autowire(env: 'default::APPLE_SIGN_IN_CLIENT_IDS')]
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
}
