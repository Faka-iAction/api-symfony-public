<?php

namespace App\Payment\Provider;

use App\Block\Payout\PayoutSettings;
use App\Payment\PayoutStatus;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * The Paystack payout adapter (decisions 26 and 27). Sandbox unless the legal gate is open:
 * every call takes its key from PaystackCredentials::payoutSecretKey(), which refuses a live
 * key while PAYOUTS_LIVE_APPROVED is off.
 *
 * Endpoints, from Paystack's documentation (docs-v2.paystack.com, read 2026-10-16: the
 * Transfer Recipient, Transfer and Transfers Control API references; the guides "Creating
 * transfer recipients", "Single transfers", "How transfers work" and "Verify account number";
 * the webhook events list):
 *
 * - POST /transferrecipient: `type` (`basa` is "Banking Association South Africa", ZAR bank
 *   accounts), `name`, `account_number`, `bank_code`, `currency`, `description`; answers
 *   `data.recipient_code` and `data.details` (`account_number`, `account_name`, `bank_code`,
 *   `bank_name`). Only `recipient_code` and `bank_name` are read; the account number in the
 *   answer is never kept.
 * - POST /bank/validate (South Africa only, ZAR 3 per successful request): `bank_code`,
 *   `country_code`, `account_number`, `account_name`, `account_type` (`personal`,
 *   `business`), `document_type` (`identityNumber`, `passportNumber`,
 *   `businessRegistrationNumber`), `document_number`; answers `data.verified`. Resolve
 *   Account Number (GET /bank/resolve) is for Nigeria and Ghana only.
 * - POST /transfer: `source` (`balance`), `amount` (subunit), `recipient`, `reason`,
 *   `currency`, `reference` ("a unique identifier (in lowercase)"; at least 16 alphanumeric
 *   characters, at most 100). Answers `data.status` (`otp` when the OTP setting is on,
 *   `pending` when it is off), `data.transfer_code`, `data.reference`.
 * - GET /transfer/verify/:reference: `data.status`, `data.amount`, `data.currency`,
 *   `data.reference`, `data.transfer_code`.
 * - GET /balance: `data[].currency`, `data[].balance`.
 * - Statuses ("How transfers work"): `pending`, `otp`, `received` are not conclusive;
 *   `success`, `failed`, `reversed`, `abandoned`, `blocked`, `rejected` are.
 *
 * NOT documented, and decided here (each a seam to confirm in the sandbox):
 *
 * - The unit of `data[].balance`. It is read in the currency's subunit, as every other
 *   Paystack amount is ("it must be sent in the subunit of that currency").
 * - A transfer fee field: none is documented in the transfer answer or the webhook payload,
 *   so the fee booked is the configured one (PAYOUTS_TRANSFER_FEE_MINOR).
 * - Whether a transfer reversed after `success` returns the fee. The full amount is returned
 *   to the creator's entitlement; balance reconciliation shows any difference.
 * - The answer of verify for an unknown reference: a 400 or 404 with `status: false` is "not found".
 * - The answer of /bank/list for South Africa: not called; the bank name comes from the
 *   recipient's `details.bank_name`.
 *
 * The OTP setting ("Confirm transfers before sending") must be off for automated payouts. A
 * transfer answered `otp` is PROCESSING here and is listed for an operator; Paystack
 * abandons it after 30 minutes, which a later verify reads as FAILED.
 */
final readonly class PaystackPayouts implements PayoutProvider
{
    public function __construct(
        #[Autowire(service: 'payments.paystack_http_client')]
        private HttpClientInterface $http,
        private PaystackCredentials $credentials,
        private PayoutSettings $settings,
        #[Autowire(env: 'PAYSTACK_BASE_URL')]
        private string $baseUrl,
        #[Autowire(env: 'float:PAYSTACK_TIMEOUT_SECONDS')]
        private float $timeout,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function name(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function assertCanSend(): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function supportedRails(string $countryCode): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function canValidateBankAccount(string $countryCode): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function validateBankAccount(BankAccountValidation $validation): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function createBankRecipient(BankRecipient $recipient): TransferRecipient
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function initiateTransfer(TransferRequest $request): ProviderTransfer
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function verifyTransfer(string $reference): ProviderTransfer
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function balances(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The canonical meaning of a Paystack transfer status ("How transfers work"). An unknown
     * value is PROCESSING: never paid, never failed, until the provider is clear.
     */
    public static function transferStatus(string $status): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
