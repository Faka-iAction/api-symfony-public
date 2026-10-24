<?php

namespace App\Identity\Delivery;

use App\Entity\MemberIdentifier;

/**
 * What a log may say about a recipient: enough for an operator to tell two apart, never
 * the full address or number.
 */
final class RecipientMask
{
    /**
     * thandi@example.com becomes t***@e***.com; +27821234567 becomes +27*******67.
     */
    public static function mask(string $identifierType, #[\SensitiveParameter] string $value): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Removes the recipient and the code from a text that is about to be logged, such as a
     * provider's error message, which may quote either.
     */
    public static function scrub(string $text, string $identifierType, #[\SensitiveParameter] string $value, #[\SensitiveParameter] string $code): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
