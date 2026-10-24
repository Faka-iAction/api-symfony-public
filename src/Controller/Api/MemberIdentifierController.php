<?php

namespace App\Controller\Api;

use App\Api\Request\AddIdentifierRequest;
use App\Api\Request\ConfirmIdentifierRequest;
use App\Api\Request\RequestReader;
use App\Api\Response\ApiResponse;
use App\Api\Response\IdentityPresenter;
use App\Block\Identity\IdentifierBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The signed-in member's sign-in identifiers.
 */
final class MemberIdentifierController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly IdentifierBlock $identifiers,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/identifiers', name: 'api_v1_list_own_identifiers', methods: [Request::METHOD_GET])]
    public function listOwnIdentifiers(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/identifiers', name: 'api_v1_add_own_identifier', methods: [Request::METHOD_POST])]
    public function addOwnIdentifier(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/identifier-verifications', name: 'api_v1_confirm_own_identifier', methods: [Request::METHOD_POST])]
    public function confirmOwnIdentifier(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/identifiers/{identifierId}', name: 'api_v1_remove_own_identifier', methods: [Request::METHOD_DELETE])]
    public function removeOwnIdentifier(string $identifierId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
