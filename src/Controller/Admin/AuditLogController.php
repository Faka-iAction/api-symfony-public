<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Audit\AuditLogBlock;
use App\Block\Audit\AuditLogFilter;
use App\Block\Audit\AuditLogReader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The audit log viewer (ADMIN_SUPPORT; TIS 10.6): filter by target, actor, action and time,
 * newest first, a page at a time. Read only: there is no form here that changes anything.
 * Every page shown is itself recorded (AuditLogReader), with its filters.
 */
final class AuditLogController extends AdminController
{

    public function __construct(private readonly AuditLogReader $reader)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/audit', name: 'admin_audit', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::AUDIT_READ)]
    public function list(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
