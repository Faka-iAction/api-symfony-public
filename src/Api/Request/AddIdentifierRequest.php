<?php

namespace App\Api\Request;

use App\Block\Identity\ContactIdentifier;
use App\Identity\Social\SocialCredentialType;
use App\Identity\Social\SocialProvider;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The contract's AddIdentifierRequest: a SignInIdentifier (email or phone) or an
 * AddSocialIdentifierRequest. The schema has no discriminator; `type` tells them apart.
 */
final readonly class AddIdentifierRequest implements RequestBody
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
