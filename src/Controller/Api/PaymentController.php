<?php

namespace App\Controller\Api;

use App\Api\ApiRoute;
use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Request\CreatePaymentRequest;
use App\Api\Request\RaiseBidRequest;
use App\Api\Request\RequestReader;
use App\Api\Response\ApiResponse;
use App\Api\Response\PaymentPresenter;
use App\Block\Action\GuestSessionBlock;
use App\Block\Action\Participant;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Payment\PaymentBlock;
use App\Security\ApiTokenAuthenticator;
use App\Security\AuthenticatedMember;
use App\Web\PublicUrls;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The participant's payments: listActionPaymentMethods, createPayment, raiseBid, getPayment
 * and getPaymentReceipt. A member's bearer token or a guest token (CONVENTIONS.md 12.6).
 *
 * createPayment takes no amount: the server charges the Action's amount due. The payer is
 * sent back from the provider to the Action's web status page, which, like getPayment, never
 * treats the return as proof of payment.
 */
final class PaymentController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly GuestSessionBlock $guests,
        private readonly PaymentBlock $payments,
        private readonly IdempotencyBlock $idempotency,
        private readonly Security $security,
        private readonly PublicUrls $urls,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/actions/{actionId}/payment-methods', name: 'api_v1_list_action_payment_methods', methods: [Request::METHOD_GET], defaults: ApiRoute::PARTICIPANT_DEFAULTS)]
    public function listActionPaymentMethods(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/actions/{actionId}/payments', name: 'api_v1_create_payment', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function createPayment(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/actions/{actionId}/bid-raises', name: 'api_v1_raise_bid', methods: [Request::METHOD_POST], defaults: ApiRoute::PARTICIPATION_DEFAULTS)]
    public function raiseBid(string $actionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/payments/{paymentId}', name: 'api_v1_get_payment', methods: [Request::METHOD_GET], defaults: ApiRoute::PARTICIPANT_DEFAULTS)]
    public function getPayment(string $paymentId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/payments/{paymentId}/receipt', name: 'api_v1_get_payment_receipt', methods: [Request::METHOD_GET], defaults: ApiRoute::PARTICIPANT_DEFAULTS)]
    public function getPaymentReceipt(string $paymentId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
