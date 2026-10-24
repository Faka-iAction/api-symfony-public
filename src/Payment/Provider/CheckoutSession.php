<?php

namespace App\Payment\Provider;

/**
 * A started hosted checkout: the page to send the payer to.
 */
final readonly class CheckoutSession
{
    public function __construct(
        public string $reference,
        public string $checkoutUrl,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
