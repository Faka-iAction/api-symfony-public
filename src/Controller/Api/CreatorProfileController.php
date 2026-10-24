<?php

namespace App\Controller\Api;

use App\Api\Request\CreateCreatorProfileRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\UpdateCreatorProfileRequest;
use App\Api\Response\ApiResponse;
use App\Api\Response\CreatorPresenter;
use App\Block\Creator\CreatorProfileBlock;
use App\Block\Idempotency\IdempotencyBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The signed-in member's own creator profile. Singular: a member has at most one.
 */
final class CreatorProfileController
{

    public function __construct(
        private readonly RequestReader $reader,
        private readonly CreatorProfileBlock $profiles,
        private readonly IdempotencyBlock $idempotency,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile', name: 'api_v1_become_creator', methods: [Request::METHOD_POST])]
    public function becomeCreator(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile', name: 'api_v1_get_own_creator_profile', methods: [Request::METHOD_GET])]
    public function getOwnCreatorProfile(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile', name: 'api_v1_update_own_creator_profile', methods: [Request::METHOD_PATCH])]
    public function updateOwnCreatorProfile(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
