<?php

namespace App\Api\Request;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;

/**
 * The fields a PATCH sent, refused when there are none (CONVENTIONS.md, section 2).
 */
final class PartialUpdate
{
    /**
     * @param array<string, mixed> $payload
     *
     * @return array<string, mixed>
     *
     * @throws ApiProblemException VALIDATION_FAILED with EMPTY_UPDATE
     */
    public static function changes(array $payload): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
