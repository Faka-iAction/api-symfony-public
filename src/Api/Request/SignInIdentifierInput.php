<?php

namespace App\Api\Request;

use App\Block\Identity\ContactIdentifier;

/**
 * Turns a SignInIdentifier object of the contract into the form the Blocks use.
 */
final class SignInIdentifierInput
{
    /**
     * @param array<mixed> $identifier valid against Rules::signInIdentifier()
     */
    public static function toContact(array $identifier): ContactIdentifier
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
