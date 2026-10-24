<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;

/**
 * The contract's VoidCashReceiptRequest. The body is optional.
 */
final readonly class VoidCashReceiptRequest implements RequestBody
{

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function none(): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
