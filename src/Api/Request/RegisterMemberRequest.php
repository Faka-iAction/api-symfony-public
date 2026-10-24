<?php

namespace App\Api\Request;

use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Block\Identity\ContactIdentifier;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * The contract's RegisterMemberRequest.
 */
final readonly class RegisterMemberRequest implements RequestBody
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
