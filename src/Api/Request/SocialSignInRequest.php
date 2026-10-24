<?php

namespace App\Api\Request;

use App\Identity\Social\SocialCredentialType;
use App\Identity\Social\SocialProvider;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's SocialSignInRequest.
 */
final readonly class SocialSignInRequest implements RequestBody
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
