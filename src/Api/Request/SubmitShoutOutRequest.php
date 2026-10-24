<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's SubmitShoutOutRequest. The Creator Action's own length limit and the
 * screening are checked by the Block.
 */
final readonly class SubmitShoutOutRequest implements RequestBody
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
