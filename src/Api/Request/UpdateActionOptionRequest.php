<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use App\Block\Action\ActionOptionBlock;
use App\Entity\ActionOption;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's UpdateActionOptionRequest.
 */
final readonly class UpdateActionOptionRequest implements RequestBody
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
