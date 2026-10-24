<?php

namespace App\Block\Identity;

/**
 * A new token pair. This is the only moment the tokens exist in clear: only their
 * hashes are stored.
 */
final readonly class IssuedTokens
{
    /**
     * @param int $expiresIn        seconds until the access token expires
     * @param int $refreshExpiresIn seconds until the refresh token expires
     */
    public function __construct(
        #[\SensitiveParameter]
        public string $accessToken,
        public int $expiresIn,
        #[\SensitiveParameter]
        public string $refreshToken,
        public int $refreshExpiresIn,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
