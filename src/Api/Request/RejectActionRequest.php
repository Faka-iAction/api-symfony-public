<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's RejectActionRequest. The body is optional; the controller reads it only
 * when one is sent.
 */
final readonly class RejectActionRequest implements RequestBody
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
