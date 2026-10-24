<?php

namespace App\Payment\Provider;

/**
 * The provider's acknowledgement of a refund request. `status` is a canonical refund status:
 * SUBMITTED while the provider works on it, SUCCEEDED, or FAILED.
 */
final readonly class ProviderRefund
{
    public function __construct(
        public string $status,
        public ?string $providerRefundId,
        public string $providerStatus,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
