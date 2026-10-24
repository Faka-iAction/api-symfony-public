<?php

namespace App\Controller\Web;

use App\Action\ActionDefaults;
use App\Action\ActionType;
use App\Action\Money;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\CreatorActionView;
use App\Block\Action\GuestSessionBlock;
use App\Block\Action\IssuedGuestSession;
use App\Block\Action\Participant;
use App\Block\Action\ParticipantActionBlock;
use App\Block\Action\ParticipationBlock;
use App\Block\Action\PublicChoice;
use App\Block\Action\PublicCreatorActionBlock;
use App\Block\Country\CountryPolicyException;
use App\Block\Creator\CreatorException;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Idempotency\IdempotencyException;
use App\Block\Payment\CashBlock;
use App\Block\Payment\CashOffer;
use App\Block\Payment\PaymentBlock;
use App\Entity\CashReceipt;
use App\Payment\PaymentState;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Security\WebMember;
use App\Web\ActionPresentation;
use App\Web\ConsumerNavigation;
use App\Web\GuestCookie;
use App\Web\PublicUrls;
use App\Web\WebCsrf;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\RateLimiter\RateLimiterFactoryInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

/**
 * One Creator Action, `/@handle/action` (architecture 6.1 and 9), and a free submission to
 * it: a Request, a Vote or a Shout-out (architecture 5).
 *
 * The page comes from PublicCreatorActionBlock, as the API's getPublicCreatorAction does.
 * A submission goes through ParticipationBlock and IdempotencyBlock, as the API's
 * submitRequest, submitVote and submitShoutOut do; every business rule is theirs. This
 * controller only reads the form, keeps the guest cookie and words the outcome.
 *
 * Who takes part: a member signed in on the web takes part as themselves (the API's member
 * path: Participant::member, the key scoped to the member), with the session's CSRF token,
 * and the guest cookie is never used. Anyone else takes part as a guest, with the stateless
 * form protection and the guest cookie, as before. A Creator Action that does not allow
 * guests invites a visitor who is not signed in to sign in and come back to it.
 *
 * Paid Requests, Shout-outs and Tips (milestone M4): the submission is made as above, then
 * the online payment is started for it at once (PaymentBlock, as the API's createPayment),
 * and the visitor goes to the Action's status page, which links to the provider's hosted
 * checkout and shows "confirming payment" until the provider confirms it server to server.
 * The checkout is reached by a link on this site's page, not by redirecting the form post
 * off-site, so the page's form-action 'self' policy stays as it is. If the payment cannot be
 * started, the Action is kept and the status page offers to pay. Without a payment provider
 * key, paid Actions are shown with no form.
 *
 * Bids (architecture 7.4.1): the bidder chooses the amount, and must tick that they have read,
 * before paying, that they are charged now and that being outbid lowers their place.
 * The page shows the current ranking (how many bids, the top total). A bid is paid
 * online only (decision 3).
 *
 * Cash in person (architecture 12.5.3): where the Creator Action offers it (CashOffer), the
 * participant chooses between paying online and paying the creator in cash, in person, with
 * the statement that cash is paid directly to the creator and FAKA iAction does not collect
 * it. Choosing cash reports it (CashBlock, as the API's reportCashPayment) instead of starting
 * a checkout; the status page then says it waits for the creator to confirm.
 */
final class ActionPageController extends WebController
{
    /** The stateless CSRF token id of the participation forms (config/packages/framework.yaml). */
    public const CSRF_TOKEN_ID = 'web_participation';

    public function __construct(
        private readonly PublicCreatorActionBlock $publicActions,
        private readonly ParticipationBlock $participation,
        private readonly ParticipantActionBlock $participantActions,
        private readonly GuestSessionBlock $guests,
        private readonly IdempotencyBlock $idempotency,
        private readonly GuestCookie $guestCookie,
        private readonly CsrfTokenManagerInterface $csrf,
        private readonly WebCsrf $memberCsrf,
        private readonly ConsumerNavigation $navigation,
        private readonly PublicUrls $urls,
        #[Autowire(service: 'limiter.web_participation')]
        private readonly RateLimiterFactoryInterface $limiter,
        private readonly PaymentBlock $payments,
        private readonly CashBlock $cash,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/@{handle}/{actionSlug}', name: 'web_creator_action', requirements: ['handle' => '[^/]+', 'actionSlug' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function show(string $handle, string $actionSlug): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/@{handle}/{actionSlug}', name: 'web_creator_action_submit', requirements: ['handle' => '[^/]+', 'actionSlug' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function submit(string $handle, string $actionSlug, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
