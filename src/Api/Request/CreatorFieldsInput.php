<?php

namespace App\Api\Request;

use App\Block\Creator\CreatorLinkInput;
use App\Creator\LanguageTag;

/**
 * Turns the array fields of a creator profile request into the form the Blocks use.
 */
final class CreatorFieldsInput
{
    /**
     * @param array<mixed> $languages valid against Rules::languages()
     *
     * @return list<string>
     */
    public static function languages(array $languages): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<mixed> $links valid against Rules::links()
     *
     * @return list<CreatorLinkInput>
     */
    public static function links(array $links): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
