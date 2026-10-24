<?php

namespace App\Block\Creator;

use App\Creator\LanguageTag;
use App\Repository\CreatorCategoryRepository;
use App\Repository\CreatorProfileRepository;

/**
 * Public discovery: a creator by handle, and creator search. Only profiles the public may
 * see are ever returned (CreatorProfile::isPubliclyVisible()).
 */
final readonly class CreatorDirectoryBlock
{
    public function __construct(
        private HandleBlock $handles,
        private CreatorProfileRepository $profiles,
        private CreatorCategoryRepository $categories,
        private CreatorViewLoader $views,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A handle the creator used before resolves straight to their current profile, however
     * many renames lie between, and says which handle was asked for.
     *
     * @throws CreatorException CREATOR_NOT_FOUND for an unknown handle and a hidden profile alike
     */
    public function byHandle(string $requested): PublicCreator
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Newest profiles first. The order is fixed for the life of a cursor.
     *
     * @param string|null $category a code valid against the contract's pattern
     * @param string|null $language valid against the contract's pattern
     * @param int         $limit    validated by the caller
     *
     * @throws CreatorException UNKNOWN_CATEGORY_FILTER or INVALID_CURSOR
     */
    public function search(?string $text, ?string $category, ?string $country, ?string $city, ?string $language, int $limit, ?string $cursor): CreatorPage
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
