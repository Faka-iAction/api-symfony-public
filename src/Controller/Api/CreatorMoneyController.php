<?php

namespace App\Controller\Api;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Api\Request\ActionRules;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Response\ApiResponse;
use App\Api\Response\PaymentPresenter;
use App\Block\Payment\LedgerBlock;
use App\Payment\LedgerAccount;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The creator's read-only money views: getOwnPendingBalance and listOwnLedgerEntries. Both
 * are derived from the ledger when asked; there is no wallet and no stored balance
 * (architecture 14.2). Need the CREATOR capability.
 */
final class CreatorMoneyController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly LedgerBlock $ledger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/balance', name: 'api_v1_get_own_pending_balance', methods: [Request::METHOD_GET])]
    public function getOwnPendingBalance(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/ledger-entries', name: 'api_v1_list_own_ledger_entries', methods: [Request::METHOD_GET])]
    public function listOwnLedgerEntries(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
