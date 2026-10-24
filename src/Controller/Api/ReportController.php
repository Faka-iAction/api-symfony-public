<?php

namespace App\Controller\Api;

use App\Api\ApiRoute;
use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Api\Request\FileReportRequest;
use App\Api\Request\RequestReader;
use App\Api\Response\ApiResponse;
use App\Block\Action\GuestSessionBlock;
use App\Block\Moderation\ModerationException;
use App\Block\Moderation\ReportBlock;
use App\Security\ApiTokenAuthenticator;
use App\Security\AuthenticatedMember;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * fileReport (contract alpha.4, CONVENTIONS item 87): the web's report form for the app,
 * through the same ReportBlock. The caller is a member (bearer token) or a guest
 * (X-Guest-Token), and is counted under the stricter participation limit.
 */
final class ReportController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly ReportBlock $reports,
        private readonly GuestSessionBlock $guests,
        private readonly Security $security,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/reports', name: 'api_v1_file_report', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function fileReport(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
