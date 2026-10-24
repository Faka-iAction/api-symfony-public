<?php

namespace App\Payment\Provider;

/**
 * The provider-neutral payout abstraction (architecture 13.4: payout initiation, payout
 * status, reconciliation).
 * Domain code depends on this interface and the canonical payout states
 * (App\Payment\PayoutStatus), never on a provider's own fields.
 *
 * Every method fails closed: with no key it throws ProviderNotConfigured, and with a live
 * key while the legal gate is closed it throws PayoutsNotApproved; nothing is sent either way.
 */
interface PayoutProvider
{
    public const RAIL_BANK_ACCOUNT = 'BANK_ACCOUNT';
    /**
     * Named seam for decision 27's mobile money / e-wallet payouts. Not offered for South
     * Africa: Paystack's documentation lists mobile money recipients for Ghana and Kenya only,
     * and does not mention e-wallets.
     */
    public const RAIL_MOBILE_MONEY = 'MOBILE_MONEY';

    /**
     * The provider status of a transfer held for the merchant's approval (Paystack: `otp`, when
     * the "Confirm transfers before sending" setting is on). Listed for an operator.
     */
    public const STATUS_AWAITING_APPROVAL = 'otp';

    public function name(): string;

    /**
     * Fails as every other call would, without calling the provider: a payout run checks the
     * legal gate before it records anything.
     *
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     */
    public function assertCanSend(): void;

    /**
     * @return list<string> the RAIL_* values for the country (ISO 3166-1 alpha-2)
     */
    public function supportedRails(string $countryCode): array;

    /**
     * Whether the provider can verify a bank account against its owner for the country.
     */
    public function canValidateBankAccount(string $countryCode): bool;

    /**
     * Checks the account against the owner's identity or registration number. Nothing is kept.
     *
     * @return bool whether the provider says the account is verified
     *
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     * @throws ProviderRejected      the provider refused the request (for example an unknown bank)
     * @throws ProviderUnavailable
     */
    public function validateBankAccount(BankAccountValidation $validation): bool;

    /**
     * Registers a bank account as a transfer recipient. The answer carries only what may be
     * kept: the recipient's code and the bank's name.
     *
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     * @throws ProviderRejected
     * @throws ProviderUnavailable
     */
    public function createBankRecipient(BankRecipient $recipient): TransferRecipient;

    /**
     * Asks for a transfer from the platform's provider balance.
     *
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     * @throws ProviderRejected       a definite refusal: no transfer exists
     * @throws ProviderOutcomeUnknown the transfer may exist; verify it by reference, never send it again
     */
    public function initiateTransfer(TransferRequest $request): ProviderTransfer;

    /**
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     * @throws TransactionNotFound   the provider has no transfer with this reference
     * @throws ProviderUnavailable
     */
    public function verifyTransfer(string $reference): ProviderTransfer;

    /**
     * The platform's balance with the provider, per currency.
     *
     * @return list<ProviderBalance>
     *
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     * @throws ProviderUnavailable
     */
    public function balances(): array;
}
