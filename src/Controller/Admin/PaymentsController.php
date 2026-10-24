<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Audit\AuditActor;
use App\Block\Payment\PaymentOperationsBlock;
use App\Repository\PaymentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Payments for support and operations (PaymentOperationsBlock): what needs attention, a
 * lookup by payment ID or provider reference, one payment with its refund, ledger lines,
 * state history and reconciliation exceptions, and resolving an exception (operations only,
 * audited). No page moves money or changes a payment.
 */
final class PaymentsController extends AdminController
{

    public function __construct(
        private readonly PaymentOperationsBlock $operations,
        private readonly PaymentRepository $payments,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/payments', name: 'admin_payments', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::PAYMENTS_READ)]
    public function show(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/payments/{paymentId}', name: 'admin_payment', requirements: ['paymentId' => self::ID], methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::PAYMENTS_READ)]
    public function payment(string $paymentId): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/reconciliation/{issueId}/resolve', name: 'admin_reconciliation_resolve', requirements: ['issueId' => self::ID], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::PAYMENTS_RESOLVE)]
    public function resolve(string $issueId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
