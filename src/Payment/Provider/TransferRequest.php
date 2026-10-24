<?php

namespace App\Payment\Provider;

/**
 * A transfer from the platform's provider balance to a registered recipient. `reference` is
 * the payout's own, unique and lower case; the provider treats a second request with the
 * same reference as the same transfer.
 */
final readonly class TransferRequest
{
    public function __construct(
        public string $reference,
        public int $amountMinor,
        public string $currency,
        public string $recipientCode,
        public string $reason,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
