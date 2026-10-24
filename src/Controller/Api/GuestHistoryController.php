<?php

namespace App\Controller\Api;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Request\RequestReader;
use App\Api\Response\ApiResponse;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\GuestSessionBlock;
use App\Security\ApiTokenAuthenticator;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * convertGuestHistory (contract alpha.4, CONVENTIONS item 90): the web's "Keep your history"
 * for the app. The member proves the guest session is theirs with its token, and
 * GuestSessionBlock::convert() links its Actions to them, as the web does.
 */
final class GuestHistoryController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly GuestSessionBlock $guests,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/guest-history', name: 'api_v1_convert_guest_history', methods: [Request::METHOD_POST])]
    public function convertGuestHistory(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
