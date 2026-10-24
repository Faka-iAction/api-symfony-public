<?php

namespace App\Payment\Provider;

/**
 * A provider's answer about one transaction, already mapped onto the canonical payment
 * states (PaymentState). The provider's own status string is kept only for logs and the
 * reconciliation record, never for decisions.
 *
 * `state` is one of CONFIRMED, PENDING, FAILED, EXPIRED (the payer abandoned the checkout)
 * or REVERSED (refunded or charged back at the provider).
 */
final readonly class ProviderTransaction
{
    /**
     * @param int|null $feesMinor the provider's processing fee in minor units, when it reports one
     */
    public function __construct(
        public string $reference,
        public string $state,
        public ?int $amountMinor,
        public ?string $currency,
        public ?int $feesMinor,
        public ?string $providerTransactionId,
        public string $providerStatus,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
