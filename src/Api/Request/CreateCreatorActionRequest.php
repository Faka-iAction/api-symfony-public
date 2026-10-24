<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use App\Action\ActionType;
use App\Block\Action\CreatorActionInput;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's CreateCreatorActionRequest.
 */
final readonly class CreateCreatorActionRequest implements RequestBody
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
