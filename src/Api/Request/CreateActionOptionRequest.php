<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's CreateActionOptionRequest.
 */
final readonly class CreateActionOptionRequest implements RequestBody
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
