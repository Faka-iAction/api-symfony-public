<?php

namespace App\Identity\Social;

use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

/**
 * Hands a credential to the verifier of its provider. A provider without a verifier
 * is unavailable, never accepted.
 */
final readonly class RoutingSocialIdentityVerifier implements SocialIdentityVerifier
{
    /**
     * @param iterable<ProviderVerifier> $verifiers
     */
    public function __construct(
        #[AutowireIterator(ProviderVerifier::TAG)]
        private iterable $verifiers,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function verify(SocialProvider $provider, SocialCredentialType $type, string $credential, ?string $nonce): VerifiedSocialIdentity
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
