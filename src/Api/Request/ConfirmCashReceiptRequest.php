<?php

namespace App\Api\Request;

use App\Action\Money;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's ConfirmCashReceiptRequest: the creator restates the amount they attest to,
 * which must equal the receipt's.
 */
final readonly class ConfirmCashReceiptRequest implements RequestBody
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
