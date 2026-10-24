<?php

namespace App\Block\Creator;

use App\Entity\CreatorProfile;
use App\Repository\CreatorLanguageRepository;
use App\Repository\CreatorLocationRepository;
use App\Repository\CreatorPublicLinkRepository;

/**
 * Loads what goes with a list of profiles in a fixed number of queries, however long
 * the list is.
 */
final readonly class CreatorViewLoader
{
    public function __construct(
        private CreatorLanguageRepository $languages,
        private CreatorLocationRepository $locations,
        private CreatorPublicLinkRepository $links,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function one(CreatorProfile $profile): CreatorView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<CreatorProfile> $profiles
     *
     * @return list<CreatorView> in the same order
     */
    public function many(array $profiles, bool $withLinks = false): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
