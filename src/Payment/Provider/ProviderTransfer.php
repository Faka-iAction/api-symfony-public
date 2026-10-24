<?php

namespace App\Payment\Provider;

/**
 * A provider's answer about one transfer, mapped onto the canonical payout states
 * (App\Payment\PayoutStatus): PROCESSING, PAID, FAILED or REVERSED. The provider's own status
 * is kept for the record only.
 */
final readonly class ProviderTransfer
{
    public function __construct(
        public string $reference,
        public string $status,
        public ?int $amountMinor,
        public ?string $currency,
        public ?string $transferCode,
        public string $providerStatus,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
