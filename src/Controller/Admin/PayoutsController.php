<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Audit\AuditActor;
use App\Block\Payout\PayoutBlock;
use App\Block\Payout\PayoutViewBlock;
use App\Block\Settlement\SettlementException;
use App\Block\Settlement\SettlementProfileBlock;
use App\Repository\PayoutRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Payouts for operators (decision 26), ADMIN_OPERATIONS only: the recent payout runs, the
 * payouts that failed, were reversed or have an unknown outcome, and the payout details
 * waiting for a manual review.
 *
 * Read only, with two exceptions, both audited: "retry verification" asks the provider about
 * one payout and applies a definite answer (PayoutBlock::retryVerification(); it never sends a
 * transfer), and a review approves or rejects a destination waiting for verification. No page
 * records, sends, cancels or edits a payout or any amount: there is no manual money movement
 * from the web. The legal gate (PAYOUTS_LIVE_APPROVED) is deployment configuration and is not
 * shown or changed here.
 *
 * A destination is shown masked only; operators never see a full account number, because none
 * is stored.
 */
final class PayoutsController extends AdminController
{

    public function __construct(
        private readonly PayoutViewBlock $views,
        private readonly PayoutBlock $payouts,
        private readonly PayoutRepository $payoutRecords,
        private readonly SettlementProfileBlock $settlement,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/payouts', name: 'admin_payouts', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::PAYOUTS_OPERATE)]
    public function show(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/payouts/{payoutId}/verify', name: 'admin_payouts_verify', requirements: ['payoutId' => '[A-Za-z0-9_\-]{1,64}'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::PAYOUTS_OPERATE)]
    public function verify(string $payoutId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/payouts/reviews/{profileId}/{decision}', name: 'admin_payouts_review', requirements: ['profileId' => '[A-Za-z0-9_\-]{1,64}', 'decision' => 'approve|reject'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::PAYOUTS_OPERATE)]
    public function review(string $profileId, string $decision, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
