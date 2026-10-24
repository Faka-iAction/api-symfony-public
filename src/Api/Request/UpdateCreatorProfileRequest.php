<?php

namespace App\Api\Request;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Block\Creator\CreatorProfileBlock;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's UpdateCreatorProfileRequest. Only the fields that were sent are kept,
 * because an absent field is left unchanged and a null one is cleared.
 */
final readonly class UpdateCreatorProfileRequest implements RequestBody
{

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
