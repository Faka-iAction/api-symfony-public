<?php

namespace App\Payment\Provider;

use App\Block\Payout\PayoutSettings;
use App\Payment\PaymentState;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * The Paystack adapter (decision 25), in Paystack's test mode only (PaystackCredentials).
 *
 * Endpoints, from Paystack's documentation (docs-v2.paystack.com, read 2026-10-15):
 *
 * - POST /transaction/initialize: `email`, `amount` (in the currency's subunit), `currency`,
 *   `reference`, `callback_url`; answers `data.authorization_url`, `data.access_code`,
 *   `data.reference`.
 * - GET /transaction/verify/:reference: `data.status`, `data.reference`, `data.amount`,
 *   `data.currency`, `data.fees`, `data.id`. The top-level `status` is the API call's, the
 *   transaction's is `data.status` (abandoned, failed, ongoing, pending, processing, queued,
 *   reversed, success).
 * - POST /refund: `transaction` (reference or id), `amount` (subunit, defaults to the full
 *   amount, cannot exceed it), `currency`; answers `data.id`, `data.status` (pending,
 *   processing, processed, failed).
 * - Notifications: header `x-paystack-signature`, an HMAC SHA512 of the payload with the
 *   secret key, as hex. It is checked here over the raw body, never over re-encoded JSON.
 *   Events acted on: `charge.success`, `refund.pending`, `refund.processing`,
 *   `refund.processed`, `refund.failed`, and for payouts (PaystackPayouts) `transfer.success`,
 *   `transfer.failed`, `transfer.reversed` (`data.reference`, `data.amount`, `data.currency`,
 *   `data.transfer_code`, `data.id`; read 2026-10-16).
 *
 * NOT documented, and decided here (each is a seam to confirm in the sandbox):
 *
 * - The response to verify for an unknown reference: a 400 or 404 with `status: false` is
 *   read as "not found". A 401 or 403 is a key problem and is "unavailable", never "not found".
 * - Whether a `charge.success` notification carries `data.fees`: read when present. The fee
 *   that is booked comes from verify, which documents it.
 * - What identifies one notification across deliveries: the event name with the transaction
 *   id (charges) or the transaction and refund references (refunds), else a hash of the body.
 *
 * Payouts are transfers, in PaystackPayouts.
 */
final readonly class PaystackProvider implements PaymentProvider
{
    public const NAME = 'paystack';

    public function __construct(
        #[Autowire(service: 'payments.paystack_http_client')]
        private HttpClientInterface $http,
        private PaystackCredentials $credentials,
        #[Autowire(env: 'PAYSTACK_BASE_URL')]
        private string $baseUrl,
        #[Autowire(env: 'float:PAYSTACK_TIMEOUT_SECONDS')]
        private float $timeout,
        private LoggerInterface $logger,
        /** The legal gate for transfer notifications signed with a live key; without it, never approved. */
        private ?PayoutSettings $payoutSettings = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function name(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isConfigured(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function supportedCurrencies(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function createCheckout(CheckoutRequest $request): CheckoutSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function verify(string $reference): ProviderTransaction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function refund(string $reference, int $amountMinor, string $currency): ProviderRefund
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function parseNotification(string $rawBody, array $headers): ProviderEvent
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The canonical meaning of a Paystack transaction status (documented list above). An
     * unknown value is PENDING: never confirmed, never failed, until the provider is clear.
     */
    public static function transactionState(string $status): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function refundStatus(string $status): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
