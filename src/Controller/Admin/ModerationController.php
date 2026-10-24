<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Moderation\ModerationBlock;
use App\Block\Moderation\ModerationCaseView;
use App\Block\Moderation\ModerationException;
use App\Moderation\Moderation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The moderation queue and its decisions, for ADMIN_MODERATOR (architecture 28). Every
 * decision goes through ModerationBlock, with a mandatory reason, and is audited and
 * evented there. Each decision has a confirmation page (GET) that says what it will do and
 * asks for the reason; only its POST, with the admin CSRF token, decides. Nothing here is
 * automatic.
 */
final class ModerationController extends AdminController
{

    public function __construct(private readonly ModerationBlock $moderation)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/moderation', name: 'admin_moderation', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::MODERATION_ACT)]
    public function queue(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/moderation/{caseId}', name: 'admin_moderation_case', requirements: ['caseId' => '[0-9A-Z]{26}'], methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::MODERATION_ACT)]
    public function show(string $caseId): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/moderation/{caseId}/{decision}', name: 'admin_moderation_confirm', requirements: ['caseId' => '[0-9A-Z]{26}', 'decision' => self::DECISIONS], methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::MODERATION_ACT)]
    public function confirm(string $caseId, string $decision, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/moderation/{caseId}/{decision}', name: 'admin_moderation_decide', requirements: ['caseId' => '[0-9A-Z]{26}', 'decision' => self::DECISIONS], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::MODERATION_ACT)]
    public function decide(string $caseId, string $decision, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
