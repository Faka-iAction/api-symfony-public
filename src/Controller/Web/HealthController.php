<?php

namespace App\Controller\Web;

use App\Block\HealthBlock;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HealthController extends AbstractController
{
    #[Route('/health', name: 'web_health', methods: [Request::METHOD_GET])]
    public function __invoke(HealthBlock $health): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
