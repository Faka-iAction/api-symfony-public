<?php

namespace App\Controller\Web;

use App\Block\Action\ActionException;
use App\Block\Action\ParticipantActionBlock;
use App\Block\Action\PublicCreatorActionBlock;
use App\Block\Creator\CreatorDirectoryBlock;
use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorView;
use App\Block\Creator\FollowBlock;
use App\Block\Qr\QrResolverBlock;
use App\Block\Qr\QrStatus;
use App\Creator\CreatorDefaults;
use App\Entity\Member;
use App\Security\WebMember;
use App\Web\ConsumerNavigation;
use App\Web\DeviceClass;
use App\Web\PublicUrls;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Discover, Search and How it works, as the UI reference draws them (ui-spec 8.1 to 8.3,
 * screenshots 01 to 08, 19, 23 and 24).
 *
 * - `/` is the website (web/landing.html.twig) on a desktop and Discover on a phone;
 *   `/discover` is Discover on any device. Discover is the hub (two picks: scan a QR code, search creators) for a guest who has taken
 *   part and a new member, and the search itself for a member who follows someone or has
 *   taken part.
 * - The scan dialog is part of the page and opens at `#scan` (CSS only, so it works with the
 *   self-only CSP and without JavaScript). A typed code goes to `/q`, which redirects to
 *   `/q/{code}` or shows the page again with the dialog open and the refusal under the field.
 * - `/search` (and `/@`) is Search: text, Type and Actions filter chips, All | Following for a
 *   member who follows someone, six creators at a time.
 *
 * The API filters by one category and has no filter by kind of Creator Action. So several
 * types are searched one by one and merged, and the Actions filter reads each listed
 * creator's public Creator Actions; both are bounded by MAX_CANDIDATES.
 */
final class DiscoverController extends WebController
{

    /** The Type chips (ui-spec 8.3): category code => label. */
    public const TYPES = ['dj' => 'DJ', 'youtuber' => 'YouTuber', 'tiktok_creator' => 'TikTok creator'];

    /** The Actions chips (ui-spec 8.3): action type => label. */
    public const KINDS = ['REQUEST' => 'Request', 'SHOUT_OUT' => 'Shout-out', 'VOTE' => 'Vote', 'BID' => 'Bid'];

    public function __construct(
        private readonly CreatorDirectoryBlock $directory,
        private readonly PublicCreatorActionBlock $publicActions,
        private readonly FollowBlock $follows,
        private readonly ParticipantActionBlock $participantActions,
        private readonly QrResolverBlock $qr,
        private readonly ConsumerNavigation $navigation,
        private readonly PublicUrls $urls,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The home page (product owner, 2026-10-24): the website (website.html) on a desktop, the
     * web app's Discover on a phone. The answer varies with the device, and says so.
     */
    #[Route('/', name: 'web_discover', methods: [Request::METHOD_GET])]
    public function landing(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Discover in the web app, on any device (the website links to it). */
    #[Route('/discover', name: 'web_discover_app', methods: [Request::METHOD_GET])]
    public function discover(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/search', name: 'web_search', methods: [Request::METHOD_GET])]
    #[Route('/@', name: 'web_search_short', methods: [Request::METHOD_GET])]
    public function search(Request $request, string $title = 'Search'): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A typed QR code: on to `/q/{code}` when it leads to a creator, otherwise Discover again
     * with the scan dialog open and the refusal under the field.
     */
    #[Route('/q', name: 'web_qr_entry', methods: [Request::METHOD_GET])]
    public function qrEntry(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** How it works (ui-spec 8.2, screenshots 04 and 05). */
    #[Route('/learn', name: 'web_learn', methods: [Request::METHOD_GET])]
    public function learn(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
