<?php

namespace App\Block\Creator;

final readonly class CreatorLinkInput
{
    /**
     * @param string $type CreatorDefaults::LINK_TYPES
     */
    public function __construct(
        public string $type,
        public ?string $label,
        public string $url,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
