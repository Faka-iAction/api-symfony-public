<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Support\SupportBlock;
use App\Block\Support\SupportException;
use App\Support\Support;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Support tickets for ADMIN_SUPPORT (architecture 29; SupportBlock): the queue by state, the
 * longest waiting first; one conversation; an answer, which leaves the ticket waiting for the
 * person unless another state is picked; and a state change. Every answer and state change is
 * audited without its text.
 */
final class SupportController extends AdminController
{

    /** The queue's filters: what each tab lists. */
    public const FILTERS = [
        'waiting' => [Support::OPEN, Support::IN_PROGRESS],
        'answered' => [Support::WAITING_FOR_MEMBER, Support::WAITING_FOR_CREATOR],
        'done' => [Support::RESOLVED, Support::CLOSED],
    ];

    public function __construct(private readonly SupportBlock $support)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/support', name: 'admin_support', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::SUPPORT_ANSWER)]
    public function queue(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/support/{ticketId}', name: 'admin_support_ticket', requirements: ['ticketId' => self::ID], methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::SUPPORT_ANSWER)]
    public function ticket(string $ticketId): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/support/{ticketId}/answer', name: 'admin_support_answer', requirements: ['ticketId' => self::ID], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::SUPPORT_ANSWER)]
    public function answer(string $ticketId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/support/{ticketId}/status', name: 'admin_support_status', requirements: ['ticketId' => self::ID], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::SUPPORT_ANSWER)]
    public function status(string $ticketId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
