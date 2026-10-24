<?php

namespace App\Controller\Api;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Api\ApiRoute;
use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Request\CreateGuestSessionRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Request\SubmitBidRequest;
use App\Api\Request\SubmitRequestRequest;
use App\Api\Request\SubmitShoutOutRequest;
use App\Api\Request\SubmitTipRequest;
use App\Api\Request\SubmitVoteRequest;
use App\Api\Response\ActionPresenter;
use App\Api\Response\ApiResponse;
use App\Api\Response\ParticipantPresenter;
use App\Block\Action\GuestSessionBlock;
use App\Block\Action\Participant;
use App\Block\Action\ParticipantActionBlock;
use App\Block\Action\ParticipantView;
use App\Block\Action\ParticipationBlock;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Payment\PaymentBlock;
use App\Security\ApiTokenAuthenticator;
use App\Security\AuthenticatedMember;
use Psr\Clock\ClockInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * Guest sessions, participation (free and paid) and the participant's own Actions.
 *
 * The participation and status operations accept a member's bearer token or a guest
 * token in X-Guest-Token (CONVENTIONS.md 12.6). The firewall resolves a bearer token;
 * without one, the guest token is resolved here.
 */
final class ParticipationController
{

    public function __construct(
        private readonly RequestReader $reader,
        private readonly GuestSessionBlock $guests,
        private readonly ParticipationBlock $participation,
        private readonly ParticipantActionBlock $actions,
        private readonly IdempotencyBlock $idempotency,
        private readonly Security $security,
        private readonly PaymentBlock $payments,
        private readonly ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/guest-sessions', name: 'api_v1_create_guest_session', methods: [Request::METHOD_POST], defaults: ApiRoute::GUEST_SESSION_DEFAULTS)]
    public function createGuestSession(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creator-actions/{creatorActionId}/requests', name: 'api_v1_submit_request', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function submitRequest(string $creatorActionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creator-actions/{creatorActionId}/votes', name: 'api_v1_submit_vote', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function submitVote(string $creatorActionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creator-actions/{creatorActionId}/shout-outs', name: 'api_v1_submit_shout_out', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function submitShoutOut(string $creatorActionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creator-actions/{creatorActionId}/tips', name: 'api_v1_submit_tip', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function submitTip(string $creatorActionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creator-actions/{creatorActionId}/bids', name: 'api_v1_submit_bid', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function submitBid(string $creatorActionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/actions/{actionId}/bid-position', name: 'api_v1_get_bid_position', methods: [Request::METHOD_GET], defaults: ApiRoute::PARTICIPANT_DEFAULTS)]
    public function getBidPosition(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/actions/{actionId}/cancel', name: 'api_v1_cancel_action', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPANT_DEFAULTS)]
    public function cancelAction(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/actions/{actionId}', name: 'api_v1_get_action', methods: [Request::METHOD_GET], defaults: ApiRoute::PARTICIPANT_DEFAULTS)]
    public function getAction(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Members only: a guest token is not accepted here.
     */
    #[Route('/api/v1/me/actions', name: 'api_v1_list_own_actions', methods: [Request::METHOD_GET])]
    public function listOwnActions(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
