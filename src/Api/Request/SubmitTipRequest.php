<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use App\Action\Money;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's SubmitTipRequest. The amount is the participant's choice; the Block checks
 * it against the Creator Action's currency, minimum and maximum and the platform's limits.
 */
final readonly class SubmitTipRequest implements RequestBody
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
