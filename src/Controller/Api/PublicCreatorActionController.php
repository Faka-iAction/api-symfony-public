<?php

namespace App\Controller\Api;

use App\Action\ActionDefaults;
use App\Action\ActionType;
use App\Api\ApiRoute;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Response\ActionPresenter;
use App\Api\Response\ApiResponse;
use App\Api\Response\PublicActionPresenter;
use App\Block\Action\PublicCreatorActionBlock;
use App\Block\Payment\PaymentBlock;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The public Creator Action operations (`security: []` in the contract). They return the
 * public projections only.
 */
final class PublicCreatorActionController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly PublicCreatorActionBlock $public,
        private readonly PaymentBlock $payments,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creators/by-handle/{handle}/actions', name: 'api_v1_list_public_creator_actions', methods: [Request::METHOD_GET], defaults: ApiRoute::PUBLIC_DEFAULTS)]
    public function listPublicCreatorActions(string $handle, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creators/by-handle/{handle}/actions/{actionSlug}', name: 'api_v1_get_public_creator_action', methods: [Request::METHOD_GET], defaults: ApiRoute::PUBLIC_DEFAULTS)]
    public function getPublicCreatorAction(string $handle, string $actionSlug, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creator-actions/{creatorActionId}/options', name: 'api_v1_list_public_action_options', methods: [Request::METHOD_GET], defaults: ApiRoute::PUBLIC_DEFAULTS)]
    public function listPublicActionOptions(string $creatorActionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
