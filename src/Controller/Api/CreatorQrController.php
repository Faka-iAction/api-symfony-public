<?php

namespace App\Controller\Api;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Request\RequestReader;
use App\Api\Request\WithdrawQrRequest;
use App\Api\Response\ApiResponse;
use App\Block\Qr\CreatorQrBlock;
use App\Block\Qr\CreatorQrView;
use App\Controller\Web\CreatorQrController as WebCreatorQrController;
use App\Qr\QrCodeImage;
use App\Qr\QrSheet;
use App\Security\AuthenticatedMember;
use App\Web\PublicUrls;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The signed-in creator's QR code over the API (contract alpha.4, CONVENTIONS item 89), through
 * the same CreatorQrBlock, image and sheet as the web page /creator/qr. A member without a
 * creator profile gets CREATOR_PROFILE_NOT_FOUND, as for the other /me/creator-profile
 * operations.
 */
final class CreatorQrController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly CreatorQrBlock $qr,
        private readonly QrCodeImage $image,
        private readonly QrSheet $sheet,
        private readonly PublicUrls $urls,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile/qr', name: 'api_v1_get_own_qr_code', methods: [Request::METHOD_GET])]
    public function getOwnQrCode(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile/qr', name: 'api_v1_issue_own_qr_code', methods: [Request::METHOD_POST])]
    public function issueOwnQrCode(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile/qr/withdraw', name: 'api_v1_withdraw_own_qr_code', methods: [Request::METHOD_POST])]
    public function withdrawOwnQrCode(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile/qr/image', name: 'api_v1_get_own_qr_image', methods: [Request::METHOD_GET])]
    public function getOwnQrImage(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile/qr/sheet', name: 'api_v1_get_own_qr_sheet', methods: [Request::METHOD_GET])]
    public function getOwnQrSheet(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
