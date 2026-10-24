<?php

namespace App\Controller\Api;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Api\Request\RejectActionRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Response\ApiResponse;
use App\Api\Response\ParticipantPresenter;
use App\Block\Action\IncomingActionBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The creator's queue under /me/incoming-actions. Needs the CREATOR capability.
 */
final class IncomingActionController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly IncomingActionBlock $incoming,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/incoming-actions', name: 'api_v1_list_incoming_actions', methods: [Request::METHOD_GET])]
    public function listIncomingActions(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/incoming-actions/{actionId}', name: 'api_v1_get_incoming_action', methods: [Request::METHOD_GET])]
    public function getIncomingAction(string $actionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/incoming-actions/{actionId}/accept', name: 'api_v1_accept_action', methods: [Request::METHOD_POST])]
    public function acceptAction(string $actionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/incoming-actions/{actionId}/reject', name: 'api_v1_reject_action', methods: [Request::METHOD_POST])]
    public function rejectAction(string $actionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/incoming-actions/{actionId}/fulfil', name: 'api_v1_fulfil_action', methods: [Request::METHOD_POST])]
    public function fulfilAction(string $actionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
