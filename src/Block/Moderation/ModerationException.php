<?php

namespace App\Block\Moderation;

/**
 * A report or a moderation decision that was refused. Nothing was written.
 */
final class ModerationException extends \RuntimeException
{
    /** The subject is not there, or not public. */
    public const SUBJECT_NOT_FOUND = 'SUBJECT_NOT_FOUND';
    public const CASE_NOT_FOUND = 'CASE_NOT_FOUND';
    /** A field is missing or not valid; see $fields. */
    public const INVALID_INPUT = 'INVALID_INPUT';
    /** The automatic screening refused what was written. */
    public const SCREENING_REFUSED = 'SCREENING_REFUSED';
    /** The case is closed: no more decisions in it. */
    public const CASE_CLOSED = 'CASE_CLOSED';
    /** The decision does not apply: the target is not part of the case, or already in that state. */
    public const NOT_APPLICABLE = 'NOT_APPLICABLE';
    /** Another request changed the same thing at the same moment. */
    public const CONFLICT = 'CONFLICT';

    /**
     * @param array<string, string> $fields field => problem code, for INVALID_INPUT and SCREENING_REFUSED
     */
    public function __construct(public readonly string $failure, public readonly array $fields = [], string $message = '')
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
