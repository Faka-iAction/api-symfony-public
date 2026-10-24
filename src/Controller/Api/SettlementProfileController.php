<?php

namespace App\Controller\Api;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Api\Request\RequestReader;
use App\Api\Request\SubmitSettlementBankAccountRequest;
use App\Api\Response\ApiResponse;
use App\Api\Response\SettlementPresenter;
use App\Block\Audit\AuditActor;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Settlement\SettlementException;
use App\Block\Settlement\SettlementFailure;
use App\Block\Settlement\SettlementProfileBlock;
use App\Security\AuthenticatedMember;
use App\Security\RecentSignIn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The member's Settlement Profile (contract 1.0.0-alpha.3, decision 26):
 * getOwnSettlementProfile, and submitSettlementBankAccount, which takes the payout details
 * themselves.
 *
 * submitSettlementBankAccount needs a recent sign-in (the access token's family must have
 * started within SETTLEMENT_STEP_UP_MAX_AGE; a refresh does not count) and an
 * Idempotency-Key. Its response never contains the account number. The key's stored
 * fingerprint leaves the account number and document number out (BankAccountInput::fingerprint()).
 */
final class SettlementProfileController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly SettlementProfileBlock $settlement,
        private readonly IdempotencyBlock $idempotency,
        private readonly RecentSignIn $recentSignIn,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/settlement-profile', name: 'api_v1_get_own_settlement_profile', methods: [Request::METHOD_GET])]
    public function getOwnSettlementProfile(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/settlement-profile/bank-account', name: 'api_v1_submit_settlement_bank_account', methods: [Request::METHOD_PUT])]
    public function submitSettlementBankAccount(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function problem(SettlementException $refused): ApiProblemException
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
