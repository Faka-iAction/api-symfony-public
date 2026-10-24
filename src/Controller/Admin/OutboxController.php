<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Audit\AuditActor;
use App\Block\Outbox\OutboxOperationsBlock;
use App\Entity\OutboxEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The event outbox (architecture 23.1; TIS 16.2: dead letters are watched): the count of
 * events in each delivery status and the dead events, for ADMIN_SUPPORT and
 * ADMIN_OPERATIONS; requeueing one dead event or all of them, for ADMIN_OPERATIONS only,
 * through OutboxOperationsBlock, audited.
 *
 * A payload is never shown in full, only its field names: payloads are privacy-reviewed,
 * but this page has no need of their values.
 */
final class OutboxController extends AdminController
{

    public function __construct(private readonly OutboxOperationsBlock $outbox)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/outbox', name: 'admin_outbox', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::OUTBOX_READ)]
    public function show(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/outbox/requeue/{eventId}', name: 'admin_outbox_requeue_one', requirements: ['eventId' => '[A-Za-z0-9_\-]{1,64}'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::OUTBOX_ACT)]
    public function requeueOne(string $eventId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/outbox/requeue', name: 'admin_outbox_requeue_all_confirm', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::OUTBOX_ACT)]
    public function confirmRequeueAll(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/outbox/requeue', name: 'admin_outbox_requeue_all', methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::OUTBOX_ACT)]
    public function requeueAll(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
