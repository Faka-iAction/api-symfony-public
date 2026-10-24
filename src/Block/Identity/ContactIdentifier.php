<?php

namespace App\Block\Identity;

use App\Entity\MemberIdentifier;

/**
 * An email address or phone number in the form it is stored and compared in.
 */
final readonly class ContactIdentifier
{

    /**
     * Email addresses are compared without regard to case (domain model 3.2), so the
     * stored form is lower case.
     */
    public static function email(string $address): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $number E.164
     */
    public static function phone(string $number): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isEmail(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
