<?php

namespace App\Controller\Web;

use App\Action\ActionState;
use App\Block\Action\ActionException;
use App\Block\Action\CreatorActionBlock;
use App\Block\Action\CreatorActionView;
use App\Block\Action\IncomingActionBlock;
use App\Block\Action\ParticipantView;
use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorFailure;
use App\Block\Creator\CreatorLinkInput;
use App\Block\Creator\CreatorProfileBlock;
use App\Block\Creator\CreatorView;
use App\Block\Identity\IdentifierBlock;
use App\Creator\CreatorDefaults;
use App\Payment\LedgerAccount;
use App\Twig\WebExtension;
use App\Block\Payment\LedgerBlock;
use App\Block\Qr\QrResourceBlock;
use App\Web\PublicUrls;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Creator Home, Profile and More (architecture 4.4). Home is operational: what is open, what
 * waits for an answer, and the public page and QR code to share. Profile shows the public
 * creator identity apart from the member's private settings. More lists only pages that
 * exist.
 *
 * The QR code is shown as its public link: no QR image library is installed, so no image
 * is generated.
 */
final class CreatorHomeController extends CreatorAreaController
{

    public function __construct(
        private readonly CreatorProfileBlock $creatorProfiles,
        private readonly CreatorActionBlock $creatorActions,
        private readonly IncomingActionBlock $incoming,
        private readonly QrResourceBlock $qrResources,
        private readonly PublicUrls $urls,
        private readonly LedgerBlock $ledger,
        private readonly IdentifierBlock $identifiers,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator', name: 'web_creator_home', methods: [Request::METHOD_GET])]
    public function home(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/profile', name: 'web_creator_profile', methods: [Request::METHOD_GET])]
    public function profile(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Edit public profile (ui-spec 8.21, screenshot 51): name, kind, city, country, bio and up
     * to three links. The handle is part of the page link, so it is not changed here. The same
     * Block as the API's updateOwnCreatorProfile.
     */
    #[Route('/creator/profile/edit', name: 'web_creator_profile_edit', methods: [Request::METHOD_GET])]
    public function editProfile(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/profile/edit', name: 'web_creator_profile_save', methods: [Request::METHOD_POST])]
    public function saveProfile(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's Inbox (ui-spec 8.11, screenshot 52): what waits for an answer, newest
     * first, then the latest payouts. There is no notifications API yet, so it is made from
     * the queue and the ledger, as the app does.
     */
    #[Route('/creator/inbox', name: 'web_creator_inbox', methods: [Request::METHOD_GET])]
    public function inbox(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/more', name: 'web_creator_more', methods: [Request::METHOD_GET])]
    public function more(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
