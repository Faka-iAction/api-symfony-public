<?php

namespace App\Api\Request;

use App\Action\Money;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's CorrectCashReceiptRequest: the amount the creator now attests was received
 * (zero or more) and the reason for the correction.
 */
final readonly class CorrectCashReceiptRequest implements RequestBody
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
