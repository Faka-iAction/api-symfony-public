<?php

namespace App\Block\Creator;

/**
 * Everything a member gives to become a creator. Validated by the entry point.
 */
final readonly class CreatorProfileInput
{
    /**
     * @param list<string>           $languages canonical BCP 47 tags, no duplicates
     * @param list<CreatorLinkInput> $links
     */
    public function __construct(
        public string $handle,
        public string $displayName,
        public ?string $bio,
        public string $category,
        public string $country,
        public ?string $city,
        public array $languages,
        public array $links,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
