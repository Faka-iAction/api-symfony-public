<?php

namespace App\Api\Request;

use App\Action\Money;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's RaiseBidRequest: the increase (not the new total), the online method, and the
 * acknowledgement of the bid terms. A raise cannot be paid in cash.
 */
final readonly class RaiseBidRequest implements RequestBody
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
