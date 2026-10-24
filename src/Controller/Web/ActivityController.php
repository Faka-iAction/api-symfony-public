<?php

namespace App\Controller\Web;

use App\Action\ActionType;
use App\Block\Action\ActionException;
use App\Block\Action\Page;
use App\Block\Action\ParticipantActionBlock;
use App\Block\Action\ParticipantView;
use App\Block\Action\VoteTallyBlock;
use App\Security\WebMember;
use App\Web\ConsumerNavigation;
use App\Web\GuestCookie;
use App\Web\PublicUrls;
use Psr\Clock\ClockInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Activity, `/activity` (architecture 4.4): one's own Requests, Votes and Shout-outs, most
 * recent first, with their state in plain words.
 *
 * - A member signed in on the web sees their own: the API's listOwnActions, through the
 *   same Block.
 * - A guest sees the Actions of the guest session in this browser's cookie: what the
 *   status page already shows one by one, as a list.
 * - Anyone else sees that there is nothing yet.
 *
 * Nobody ever sees anyone else's. For a Vote the tally is shown once voting has closed, and
 * not before (decision 21). Never indexed, never cached.
 */
final class ActivityController extends WebController
{

    public function __construct(
        private readonly ParticipantActionBlock $actions,
        private readonly VoteTallyBlock $tallies,
        private readonly GuestCookie $guestCookie,
        private readonly ConsumerNavigation $navigation,
        private readonly ClockInterface $clock,
        private readonly PublicUrls $urls,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/activity', name: 'web_activity', methods: [Request::METHOD_GET])]
    public function __invoke(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
