<?php

namespace App\Controller\Api;

use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Response\ApiResponse;
use App\Api\Response\SettlementPresenter;
use App\Block\Payout\PayoutViewBlock;
use App\Payment\PayoutStatus;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * listOwnPayouts (contract 1.0.0-alpha.3): the creator's payouts, read-only. There is no
 * operation that starts, cancels or withdraws a payout: payouts are made by the platform.
 * Needs the CREATOR capability.
 */
final class CreatorPayoutController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly PayoutViewBlock $payouts,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/payouts', name: 'api_v1_list_own_payouts', methods: [Request::METHOD_GET])]
    public function listOwnPayouts(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
