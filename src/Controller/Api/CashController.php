<?php

namespace App\Controller\Api;

use App\Api\ApiRoute;
use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Request\ConfirmCashReceiptRequest;
use App\Api\Request\CorrectCashReceiptRequest;
use App\Api\Request\ReportCashPaymentRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Request\VoidCashReceiptRequest;
use App\Api\Response\ApiResponse;
use App\Api\Response\CashPresenter;
use App\Block\Action\GuestSessionBlock;
use App\Block\Action\Participant;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Payment\CashBlock;
use App\Entity\CashReceipt;
use App\Security\ApiTokenAuthenticator;
use App\Security\AuthenticatedMember;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * Cash in person (contract tag "Cash in Person"): reportCashPayment, by the participant (a
 * member's bearer token or a guest token), and listOwnCashReceipts, confirmCashReceipt,
 * voidCashReceipt and correctCashReceipt, by the creator who owns the profile only (bearer
 * token; the Block checks the CREATOR capability, the profile's owner and that it is
 * self-managed). Nobody else, an administrator included, can act on a cash receipt.
 */
final class CashController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly GuestSessionBlock $guests,
        private readonly CashBlock $cash,
        private readonly IdempotencyBlock $idempotency,
        private readonly Security $security,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/actions/{actionId}/cash-receipt', name: 'api_v1_report_cash_payment', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function reportCashPayment(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/cash-receipts', name: 'api_v1_list_own_cash_receipts', methods: [Request::METHOD_GET])]
    public function listOwnCashReceipts(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/cash-receipts/{cashReceiptId}/confirm', name: 'api_v1_confirm_cash_receipt', methods: [Request::METHOD_POST])]
    public function confirmCashReceipt(string $cashReceiptId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/cash-receipts/{cashReceiptId}/void', name: 'api_v1_void_cash_receipt', methods: [Request::METHOD_POST])]
    public function voidCashReceipt(string $cashReceiptId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/cash-receipts/{cashReceiptId}/corrections', name: 'api_v1_correct_cash_receipt', methods: [Request::METHOD_POST])]
    public function correctCashReceipt(string $cashReceiptId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
