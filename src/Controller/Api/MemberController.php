<?php

namespace App\Controller\Api;

use App\Api\Request\RequestReader;
use App\Api\Request\UpdateMemberRequest;
use App\Api\Response\ApiResponse;
use App\Api\Response\IdentityPresenter;
use App\Block\Identity\MemberBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The signed-in member's own record and capabilities. `/me` is always the caller: a
 * member's private record is never addressed by an identifier.
 */
final class MemberController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly MemberBlock $members,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me', name: 'api_v1_get_own_member', methods: [Request::METHOD_GET])]
    public function getOwnMember(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me', name: 'api_v1_update_own_member', methods: [Request::METHOD_PATCH])]
    public function updateOwnMember(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/capabilities', name: 'api_v1_get_own_capabilities', methods: [Request::METHOD_GET])]
    public function getOwnCapabilities(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
