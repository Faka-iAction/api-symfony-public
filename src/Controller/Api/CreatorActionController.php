<?php

namespace App\Controller\Api;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Api\Request\CreateCreatorActionRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Request\UpdateCreatorActionRequest;
use App\Api\Response\ActionPresenter;
use App\Api\Response\ApiResponse;
use App\Block\Action\CreatorActionBlock;
use App\Block\Idempotency\IdempotencyBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The creator's own Creator Actions under /me/creator-actions. Needs the CREATOR capability.
 */
final class CreatorActionController
{

    public function __construct(
        private readonly RequestReader $reader,
        private readonly CreatorActionBlock $creatorActions,
        private readonly IdempotencyBlock $idempotency,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions', name: 'api_v1_create_creator_action', methods: [Request::METHOD_POST])]
    public function createCreatorAction(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions', name: 'api_v1_list_own_creator_actions', methods: [Request::METHOD_GET])]
    public function listOwnCreatorActions(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}', name: 'api_v1_get_own_creator_action', methods: [Request::METHOD_GET])]
    public function getOwnCreatorAction(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}', name: 'api_v1_update_own_creator_action', methods: [Request::METHOD_PATCH])]
    public function updateOwnCreatorAction(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/publish', name: 'api_v1_publish_creator_action', methods: [Request::METHOD_POST])]
    public function publishCreatorAction(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/pause', name: 'api_v1_pause_creator_action', methods: [Request::METHOD_POST])]
    public function pauseCreatorAction(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/resume', name: 'api_v1_resume_creator_action', methods: [Request::METHOD_POST])]
    public function resumeCreatorAction(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/disable', name: 'api_v1_disable_creator_action', methods: [Request::METHOD_POST])]
    public function disableCreatorAction(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
