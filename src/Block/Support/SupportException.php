<?php

namespace App\Block\Support;

/**
 * A support request refused, with what was wrong per field for the form.
 */
final class SupportException extends \RuntimeException
{
    public const INVALID_INPUT = 'INVALID_INPUT';
    /** Not the caller's, or does not exist: the same answer for both. */
    public const NOT_FOUND = 'NOT_FOUND';
    /** The ticket is closed and takes no more messages, or the state change is not allowed. */
    public const NOT_ALLOWED = 'NOT_ALLOWED';

    /**
     * @param array<string, string> $fields field => problem code (REQUIRED, TOO_LONG, UNKNOWN_VALUE, NOT_FOUND)
     */
    public function __construct(public readonly string $failure, public readonly array $fields = [])
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
