<?php

namespace App\Identity;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * The sign-in values that the contract and the product decisions have not fixed yet
 * (CONVENTIONS.md section 14, items 5, 43 and 44). Each comes from the environment;
 * the defaults in .env are the working proposals, not decisions.
 */
final readonly class IdentitySettings
{
    public function __construct(
        #[Autowire(env: 'int:AUTH_VERIFICATION_CODE_LENGTH')]
        public int $codeLength,
        #[Autowire(env: 'int:AUTH_VERIFICATION_CODE_TTL')]
        public int $codeTtl,
        #[Autowire(env: 'int:AUTH_VERIFICATION_MAX_ATTEMPTS')]
        public int $maxAttempts,
        #[Autowire(env: 'int:AUTH_VERIFICATION_RESEND_INTERVAL')]
        public int $resendInterval,
        #[Autowire(env: 'int:AUTH_ACCESS_TOKEN_TTL')]
        public int $accessTokenTtl,
        #[Autowire(env: 'int:AUTH_REFRESH_TOKEN_TTL')]
        public int $refreshTokenTtl,
        #[Autowire(env: 'bool:AUTH_SOCIAL_LINK_BY_VERIFIED_EMAIL')]
        public bool $linkSocialByVerifiedEmail,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
