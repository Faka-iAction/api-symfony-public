<?php

namespace App\Api\Request;

use App\Moderation\Moderation;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's ReportRequest (alpha.4, fileReport).
 */
final readonly class FileReportRequest implements RequestBody
{
    public const SUBJECT_TYPES = [Moderation::SUBJECT_CREATOR_PROFILE, Moderation::SUBJECT_CREATOR_ACTION];

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
