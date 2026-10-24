<?php

namespace App\Block\Creator;

use App\Entity\CreatorCategory;

/**
 * The filters of a creator search, resolved. Each one that is set must match.
 */
final readonly class CreatorSearch
{
    /**
     * @param string|null $text     free text, matched against display name, handle and bio
     * @param string|null $city     matched without regard to case
     * @param string|null $language a canonical BCP 47 tag, matched exactly
     */
    public function __construct(
        public ?string $text,
        public ?CreatorCategory $category,
        public ?string $country,
        public ?string $city,
        public ?string $language,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Identifies the filters, so that a cursor issued for one search is refused by another.
     */
    public function fingerprint(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
