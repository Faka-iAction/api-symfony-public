<?php

namespace App\Controller\Api;

use App\Api\Request\CreateActionOptionRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\UpdateActionOptionRequest;
use App\Api\Response\ActionPresenter;
use App\Api\Response\ApiResponse;
use App\Block\Action\ActionOptionBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The options of the creator's own Creator Actions. Needs the CREATOR capability.
 */
final class ActionOptionController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly ActionOptionBlock $options,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/options', name: 'api_v1_list_creator_action_options', methods: [Request::METHOD_GET])]
    public function listCreatorActionOptions(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/options', name: 'api_v1_add_creator_action_option', methods: [Request::METHOD_POST])]
    public function addCreatorActionOption(string $creatorActionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/options/{optionId}', name: 'api_v1_update_creator_action_option', methods: [Request::METHOD_PATCH])]
    public function updateCreatorActionOption(string $creatorActionId, string $optionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-actions/{creatorActionId}/options/{optionId}', name: 'api_v1_remove_creator_action_option', methods: [Request::METHOD_DELETE])]
    public function removeCreatorActionOption(string $creatorActionId, string $optionId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
