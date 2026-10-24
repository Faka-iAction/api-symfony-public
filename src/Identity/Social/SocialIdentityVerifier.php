<?php

namespace App\Identity\Social;

/**
 * Validates a credential with the provider that issued it.
 *
 * The answer comes from the provider only: nothing the client says about who the user
 * is reaches the result. An implementation must never log the credential.
 */
interface SocialIdentityVerifier
{
    /**
     * @param string|null $nonce the nonce the client sent to the provider, to be checked against the credential
     *
     * @throws SocialCredentialRejected  the credential is invalid, expired, issued for another client or replayed
     * @throws SocialProviderUnavailable the provider could not be asked
     */
    public function verify(SocialProvider $provider, SocialCredentialType $type, string $credential, ?string $nonce): VerifiedSocialIdentity;
}
