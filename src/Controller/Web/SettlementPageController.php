<?php

namespace App\Controller\Web;

use App\Api\Request\SubmitSettlementBankAccountRequest;
use App\Block\Audit\AuditActor;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Idempotency\IdempotencyException;
use App\Block\Payment\LedgerBlock;
use App\Block\Payout\PayoutViewBlock;
use App\Block\Settlement\BankAccountInput;
use App\Block\Settlement\SettlementException;
use App\Block\Settlement\SettlementFailure;
use App\Block\Settlement\SettlementProfileBlock;
use App\Security\RecentSignIn;
use App\Web\HttpsOnly;
use App\Web\WebCsrf;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The creator's payout details (`/creator/settlement`) and payouts history (`/creator/payouts`),
 * decision 26. The same Blocks as the API (SettlementProfileBlock, PayoutViewBlock).
 *
 * The details page is HTTPS only (HttpsOnly; relaxed in dev and test only): a plain-HTTP GET
 * is redirected to HTTPS, a plain-HTTP POST is refused before anything is read. Its form needs the member CSRF token and a recent
 * sign-in (SETTLEMENT_STEP_UP_MAX_AGE, the web session's sign-in time); an older session is
 * offered "sign in again", which ends the session and returns here afterwards.
 *
 * The full account number and document number are never echoed back: the page shows the
 * masked destination only, and a form sent back with errors has those two fields empty.
 */
final class SettlementPageController extends CreatorAreaController
{

    public function __construct(
        private readonly SettlementProfileBlock $settlement,
        private readonly PayoutViewBlock $payouts,
        private readonly LedgerBlock $ledger,
        private readonly IdempotencyBlock $idempotency,
        private readonly RecentSignIn $recentSignIn,
        private readonly Security $security,
        private readonly HttpsOnly $https,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/settlement', name: 'web_creator_settlement', methods: [Request::METHOD_GET])]
    public function show(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/settlement', name: 'web_creator_settlement_submit', methods: [Request::METHOD_POST])]
    public function submit(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/settlement/sign-in-again', name: 'web_creator_settlement_sign_in_again', methods: [Request::METHOD_POST])]
    public function signInAgain(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/payouts', name: 'web_creator_payouts', methods: [Request::METHOD_GET])]
    public function payouts(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
