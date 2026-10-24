<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Block\Action\CreatorActionBlock;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's UpdateCreatorActionRequest. Only the fields that were sent are kept.
 * `type` and `slug` are not in the schema, so sending one is UNKNOWN_FIELD.
 */
final readonly class UpdateCreatorActionRequest implements RequestBody
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
