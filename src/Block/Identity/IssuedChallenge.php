<?php

namespace App\Block\Identity;

final readonly class IssuedChallenge
{
    /**
     * @param int $expiresIn   seconds until the challenge expires
     * @param int $resendAfter seconds before another code may be asked for the same identifier
     */
    public function __construct(
        public string $verificationId,
        public int $expiresIn,
        public int $resendAfter,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
