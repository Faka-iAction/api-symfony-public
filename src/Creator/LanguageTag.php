<?php

namespace App\Creator;

/**
 * BCP 47 tags are case-insensitive. A creator's languages are stored, compared and
 * returned in the conventional case (RFC 5646, section 2.1.1), so that `EN-za` and
 * `en-ZA` are one language and a search for either finds both.
 */
final class LanguageTag
{
    /**
     * @param string $tag already valid against the contract's LanguageTag pattern
     */
    public static function canonical(string $tag): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
