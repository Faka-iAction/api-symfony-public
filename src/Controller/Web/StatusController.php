<?php

namespace App\Controller\Web;

use App\Action\ActionType;
use App\Action\Money;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\Participant;
use App\Block\Action\ParticipantActionBlock;
use App\Block\Action\ParticipantView;
use App\Block\Action\VoteTallyBlock;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Idempotency\IdempotencyException;
use App\Block\Payment\PaymentBlock;
use App\Entity\GuestSession;
use App\Payment\PaymentState;
use App\Security\WebMember;
use App\Twig\WebExtension;
use App\Web\ConsumerNavigation;
use App\Web\GuestCookie;
use App\Web\PublicUrls;
use App\Web\WebCsrf;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

/**
 * The status of one's own Action, `/a/{actionId}`: the API's getAction, through the same
 * Block. A member signed in on the web reads it as the member (as with a bearer token); a
 * guest reads it through the guest cookie (as with X-Guest-Token). A signed-in member whose
 * browser also holds a guest cookie can still read that guest's Actions from it.
 *
 * Only the member or guest session that made the Action sees it. Anyone else, with or
 * without a cookie, gets the same not-found page as for an id that does not exist. The
 * page is never indexed and never cached.
 *
 * For a Vote the tally is shown once voting has closed, and not before (decision 21);
 * VoteTallyBlock decides which.
 *
 * A paid Action (milestone M4): this is also where the payment provider sends the payer
 * back. Coming back proves nothing (contract getPayment): the page asks the provider server
 * to server about an open payment (at most once per PAYMENTS_VERIFY_INTERVAL) and shows
 * "confirming payment" until the provider confirms it, by that answer or its notification.
 * While a payment is open the page links to the provider's checkout; when none is open and
 * the Action can still be paid, it offers a form to pay (`POST /a/{actionId}/pay`, the API's
 * createPayment, with the same idempotency).
 *
 * A Bid shows its total and its current place among the ranked bids (getBidPosition), with
 * the rule restated, and, while it can be raised, a form to raise it (`POST /a/{actionId}/raise`,
 * the API's raiseBid): a further payment for the difference, at least one increment, after
 * the same acknowledgement as the first bid. A cash Action shows that it waits for the creator
 * to confirm the cash, and then that the creator confirmed it (or did not receive it).
 */
final class StatusController extends WebController
{

    public function __construct(
        private readonly ParticipantActionBlock $actions,
        private readonly VoteTallyBlock $tallies,
        private readonly GuestCookie $guestCookie,
        private readonly ConsumerNavigation $navigation,
        private readonly PublicUrls $urls,
        private readonly PaymentBlock $payments,
        private readonly IdempotencyBlock $idempotency,
        private readonly CsrfTokenManagerInterface $csrf,
        private readonly WebCsrf $memberCsrf,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/a/{actionId}', name: 'web_action_status', requirements: ['actionId' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function __invoke(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/a/{actionId}/raise', name: 'web_action_raise', requirements: ['actionId' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function raise(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/a/{actionId}/pay', name: 'web_action_pay', requirements: ['actionId' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function pay(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
