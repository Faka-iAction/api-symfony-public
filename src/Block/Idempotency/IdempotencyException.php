<?php

namespace App\Block\Idempotency;

final class IdempotencyException extends \RuntimeException
{
    public const KEY_REUSED = 'KEY_REUSED';
    public const REQUEST_IN_PROGRESS = 'REQUEST_IN_PROGRESS';

    /**
     * @param self::KEY_REUSED|self::REQUEST_IN_PROGRESS $reason
     */
    public function __construct(public readonly string $reason, ?\Throwable $previous = null)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
