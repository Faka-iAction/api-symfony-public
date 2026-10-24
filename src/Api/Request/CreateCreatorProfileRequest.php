<?php

namespace App\Api\Request;

use App\Block\Creator\CreatorProfileInput;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's CreateCreatorProfileRequest.
 */
final readonly class CreateCreatorProfileRequest implements RequestBody
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
