<?php

namespace App\Controller\Web;

use App\Block\Creator\SitemapBlock;
use App\Web\PublicUrls;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * robots.txt and the sitemap (architecture 6.1, MVP1 plan M3). Both are built from the
 * request's own host through PublicUrls, so staging and production each describe themselves.
 *
 * robots.txt keeps crawlers out of what is never meant for a search engine: the signed-in
 * areas, the admin, the API, a participant's own status pages, sign-in and reporting.
 * Those pages also say noindex; robots.txt only saves the crawl.
 */
final class SeoController extends WebController
{
    /** Path prefixes no crawler needs. */
    public const DISALLOWED = ['/me', '/creator', '/admin', '/api/', '/a/', '/activity', '/following', '/sign-in', '/sign-out', '/signed-out', '/report', '/support'];

    public function __construct(private readonly PublicUrls $urls)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/robots.txt', name: 'web_robots', methods: [Request::METHOD_GET])]
    public function robots(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/sitemap.xml', name: 'web_sitemap', methods: [Request::METHOD_GET])]
    public function sitemap(SitemapBlock $sitemap): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
