<?php

namespace App\Identity\Social;

/**
 * What a provider vouches for once it has accepted a credential.
 */
final readonly class VerifiedSocialIdentity
{
    /**
     * @param string      $subject       the provider's stable identifier of the account; never sent to a client
     * @param bool        $emailVerified whether the provider itself says the email is verified
     * @param string|null $name          the name the provider reports, if any
     */
    public function __construct(
        public string $subject,
        public ?string $email,
        public bool $emailVerified,
        public ?string $name = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
