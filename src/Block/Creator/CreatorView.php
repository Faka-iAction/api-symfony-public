<?php

namespace App\Block\Creator;

use App\Entity\CreatorProfile;
use App\Entity\CreatorPublicLink;

/**
 * A creator profile together with what is stored beside it. Which of it may be shown to
 * whom is the entry point's projection to choose.
 */
final readonly class CreatorView
{
    /**
     * @param list<string>            $languages
     * @param list<CreatorPublicLink> $links     empty unless they were asked for
     * @param string|null             $imageUrl  the profile image's absolute address (/media/…), if any
     */
    public function __construct(
        public CreatorProfile $profile,
        public string $category,
        public ?string $city,
        public array $languages,
        public array $links,
        public ?string $imageUrl = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
