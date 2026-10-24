<?php

namespace App\Identity\Social;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * The verifier of one provider. RoutingSocialIdentityVerifier picks it by provider.
 */
#[AutoconfigureTag(self::TAG)]
interface ProviderVerifier
{
    public const TAG = 'app.social_provider_verifier';

    public function provider(): SocialProvider;

    /**
     * @throws SocialCredentialRejected
     * @throws SocialProviderUnavailable
     */
    public function verify(SocialCredentialType $type, string $credential, ?string $nonce): VerifiedSocialIdentity;
}
