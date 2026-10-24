<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;

/**
 * The contract's CreatePaymentRequest: the method only. There is no amount: the server
 * charges the amount due for the Action, and an `amount` field is refused as UNKNOWN_FIELD
 * like any other field the contract does not have.
 */
final readonly class CreatePaymentRequest implements RequestBody
{
    public const METHOD_PATTERN = '/^[A-Z][A-Z0-9_]*$/D';

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
