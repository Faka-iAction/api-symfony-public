<?php

namespace App\Controller\Api;

use App\Api\Request\RequestReader;
use App\Api\Response\ApiResponse;
use App\Api\Response\CreatorPresenter;
use App\Block\Creator\FollowBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The creators the signed-in member follows, addressed by the creator's public identifier.
 */
final class FollowController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly FollowBlock $follows,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/following', name: 'api_v1_list_followed_creators', methods: [Request::METHOD_GET])]
    public function listFollowedCreators(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/following/{creatorId}', name: 'api_v1_follow_creator', methods: [Request::METHOD_PUT])]
    public function followCreator(string $creatorId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/following/{creatorId}', name: 'api_v1_unfollow_creator', methods: [Request::METHOD_DELETE])]
    public function unfollowCreator(string $creatorId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
