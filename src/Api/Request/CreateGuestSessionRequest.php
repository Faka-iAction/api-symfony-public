<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;

/**
 * The contract's CreateGuestSessionRequest: optional hints, neither trusted for a decision.
 * The body itself is optional; the controller reads it only when one is sent.
 */
final readonly class CreateGuestSessionRequest implements RequestBody
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
