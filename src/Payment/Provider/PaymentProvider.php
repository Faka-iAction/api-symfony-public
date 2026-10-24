<?php

namespace App\Payment\Provider;

/**
 * The provider-neutral payment abstraction (architecture 13.4 and 62.2; TIS 9.2 and 14.2).
 * Domain code depends on this interface and on the canonical states it returns, never on a
 * provider's own status strings, fields or references.
 *
 * Capabilities used in MVP1: COLLECT (a hosted checkout), server-side verification, a full
 * REFUND and signed notifications. AUTHORIZE, CAPTURE, SPLIT/ROUTE and PAYOUT are not used
 * (architecture 13.3 and 62.2); settlement and payout belong to a later piece of work.
 *
 * Every method fails closed: with no credentials configured it throws
 * ProviderNotConfigured and sends nothing.
 */
interface PaymentProvider
{
    /** A stable name, stored with each payment (`payments.provider`). */
    public function name(): string;

    /** Whether credentials are configured. Nothing is called when they are not. */
    public function isConfigured(): bool;

    /**
     * The currencies this adapter collects in. The country policy narrows this further.
     *
     * @return list<string>
     */
    public function supportedCurrencies(): array;

    /**
     * Starts a hosted checkout. Nothing is charged by this call: the payer pays on the
     * provider's page.
     *
     * @throws ProviderNotConfigured
     * @throws ProviderUnavailable   the provider could not be reached or refused; no checkout exists
     */
    public function createCheckout(CheckoutRequest $request): CheckoutSession;

    /**
     * Asks the provider, server to server, what happened to a transaction. This is the
     * only answer other than a signed notification that may change a payment's state.
     *
     * @throws ProviderNotConfigured
     * @throws TransactionNotFound  the provider has no transaction with this reference
     * @throws ProviderUnavailable  no usable answer; the outcome stays unknown
     */
    public function verify(string $reference): ProviderTransaction;

    /**
     * Asks for a FULL refund of a transaction (decision 8: no partial refunds). The amount
     * is the full amount of the payment and is sent so that the provider can refuse a
     * mismatch; it is never less.
     *
     * @throws ProviderNotConfigured
     * @throws ProviderRejected       a definite refusal: no refund was created, a later attempt is safe
     * @throws ProviderOutcomeUnknown the request may or may not have created a refund; it must be
     *                                reconciled, never sent again blindly (TIS 8.2.2, 8.4)
     */
    public function refund(string $reference, int $amountMinor, string $currency): ProviderRefund;

    /**
     * Checks a notification's signature over the raw body and reads it. The body is never
     * trusted before this succeeds.
     *
     * @param array<string, string> $headers lower-case header names
     *
     * @throws ProviderNotConfigured
     * @throws InvalidSignature
     */
    public function parseNotification(string $rawBody, array $headers): ProviderEvent;
}
