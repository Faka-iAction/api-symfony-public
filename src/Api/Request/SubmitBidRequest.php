<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use App\Action\Money;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's SubmitBidRequest. The amount is the participant's choice; the Block checks
 * it against the Creator Action's currency, minimum bid and increment, and the platform's
 * limits. `bidTermsAcknowledged` must be true: the participant was shown, before paying,
 * that they are charged now and that being outbid lowers their place.
 */
final readonly class SubmitBidRequest implements RequestBody
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
