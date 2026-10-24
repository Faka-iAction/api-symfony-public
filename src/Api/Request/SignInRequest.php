<?php

namespace App\Api\Request;

use App\Block\Identity\ContactIdentifier;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The contract's SignInRequest: VerificationCodeGrant or PasswordGrant, chosen by `grantType`.
 */
final readonly class SignInRequest implements RequestBody
{
    public const GRANT_VERIFICATION_CODE = 'verification_code';
    public const GRANT_PASSWORD = 'password';

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
