<?php

namespace App\Block\Identity;

final class IdentityException extends \RuntimeException
{
    /**
     * @param int|null $retryAfter seconds to wait, for IdentityFailure::CODE_REQUESTED_TOO_SOON
     */
    public function __construct(
        public readonly IdentityFailure $failure,
        public readonly ?int $retryAfter = null,
        ?\Throwable $previous = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
