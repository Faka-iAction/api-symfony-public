<?php

namespace App\Block\Payment;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * The payment values that are configuration, not contract (CONVENTIONS.md 4: fee
 * percentages, the checkout window and similar are never constants). Every one is a
 * placeholder until decided; see .env.
 */
final readonly class PaymentSettings
{
    public function __construct(
        #[Autowire(env: 'int:PAYMENTS_CHECKOUT_WINDOW')]
        public int $checkoutWindowSeconds,
        #[Autowire(env: 'int:PAYMENTS_VERIFY_INTERVAL')]
        public int $verifyIntervalSeconds,
        #[Autowire(env: 'int:PAYMENTS_PLATFORM_FEE_BASIS_POINTS')]
        public int $platformFeeBasisPoints,
        #[Autowire(env: 'bool:PAYMENTS_REFUND_RETURNS_PROCESSING_FEE')]
        public bool $refundReturnsProcessingFee,
        #[Autowire(env: 'int:PAYMENTS_MAX_ATTEMPTS')]
        public int $maxAttempts,
        #[Autowire(env: 'int:PAYMENTS_RETRY_BASE_DELAY')]
        public int $retryBaseDelay,
        #[Autowire(env: 'int:PAYMENTS_RETRY_MAX_DELAY')]
        public int $retryMaxDelay,
        #[Autowire(env: 'int:PAYMENTS_CLAIM_LEASE')]
        public int $claimLeaseSeconds,
        #[Autowire(env: 'PAYSTACK_PAYER_EMAIL_DOMAIN')]
        public string $payerEmailDomain,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Seconds before attempt $attempt + 1: exponential, capped, with up to a quarter more at
     * random (as OutboxRelay::backoff()).
     */
    public function backoff(int $attempt): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The FAKA platform fee on an amount, in whole minor units, rounded half up. Integer
     * arithmetic only (TIS 9.7: no binary floating point for money).
     */
    public static function fee(int $amountMinor, int $basisPoints): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
