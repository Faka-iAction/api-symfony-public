<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;

/**
 * The contract's ConfirmIdentifierRequest.
 */
final readonly class ConfirmIdentifierRequest implements RequestBody
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
