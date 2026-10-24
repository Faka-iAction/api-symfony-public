<?php

namespace App\Controller\Api;

use App\Api\ApiRoute;
use App\Block\HealthBlock;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class HealthController
{
    #[Route('/api/v1/health', name: 'api_v1_health', methods: [Request::METHOD_GET], defaults: ApiRoute::PUBLIC_DEFAULTS)]
    public function __invoke(HealthBlock $health): JsonResponse
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
