<?php

namespace App\Block\Creator;

use App\Action\ActionState;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;

/**
 * The public pages search engines may list (architecture 6.1): the website's own pages,
 * every publicly visible creator page, and each of its Creator Actions that the public can
 * open. Exactly the pages that are indexable when a guest opens them: a hidden profile, a
 * suspended owner, a draft, a disabled or an expired Creator Action is never listed.
 *
 * Two scalar queries, no entity is loaded. One sitemap holds at most 50,000 URLs (the
 * sitemaps.org limit); past that a sitemap index is needed, which the pilot does not reach.
 */
final readonly class SitemapBlock
{
    public const MAX_URLS = 50000;

    public function __construct(private EntityManagerInterface $entityManager)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<array{path: string, lastModified: \DateTimeImmutable|null}>
     */
    public function entries(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
