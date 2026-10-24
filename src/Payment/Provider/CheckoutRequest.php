<?php

namespace App\Payment\Provider;

/**
 * What a hosted checkout is started with. The amount is the server's, in minor units.
 */
final readonly class CheckoutRequest
{
    /**
     * @param string $reference   the platform's unique reference for the payment; the provider keeps it
     * @param string $payerEmail  what the provider requires as the payer's address; see PaystackProvider
     * @param string $callbackUrl where the provider sends the payer back; never proof of payment
     */
    public function __construct(
        public string $reference,
        public int $amountMinor,
        public string $currency,
        public string $payerEmail,
        public string $callbackUrl,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
