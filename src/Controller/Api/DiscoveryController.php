<?php

namespace App\Controller\Api;

use App\Api\ApiRoute;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Response\ApiResponse;
use App\Api\Response\CreatorPresenter;
use App\Block\Creator\CreatorDirectoryBlock;
use App\Block\Qr\QrResolverBlock;
use App\Creator\CreatorDefaults;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The public operations: creator search, a creator by handle, and QR resolution. They
 * need no token (`security: []` in the contract) and return public projections only.
 */
final class DiscoveryController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly CreatorDirectoryBlock $directory,
        private readonly QrResolverBlock $qr,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creators', name: 'api_v1_search_creators', methods: [Request::METHOD_GET], defaults: ApiRoute::PUBLIC_DEFAULTS)]
    public function searchCreators(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/creators/by-handle/{handle}', name: 'api_v1_get_public_creator_by_handle', methods: [Request::METHOD_GET], defaults: ApiRoute::PUBLIC_DEFAULTS)]
    public function getPublicCreatorByHandle(string $handle, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/qr/{qrId}', name: 'api_v1_resolve_qr', requirements: ['qrId' => '.+'], methods: [Request::METHOD_GET], defaults: ApiRoute::PUBLIC_DEFAULTS)]
    public function resolveQr(string $qrId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
