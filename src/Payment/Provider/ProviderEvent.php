<?php

namespace App\Payment\Provider;

/**
 * A signed provider notification, read into the few fields the platform acts on. The raw
 * body is not kept: it carries the payer's details (TIS 14.3, "redact payloads").
 */
final readonly class ProviderEvent
{
    /** A transaction was paid. */
    public const CHARGE_SUCCEEDED = 'CHARGE_SUCCEEDED';
    /** A refund is with the provider or its processor. */
    public const REFUND_PENDING = 'REFUND_PENDING';
    public const REFUND_SUCCEEDED = 'REFUND_SUCCEEDED';
    public const REFUND_FAILED = 'REFUND_FAILED';
    /** A payout transfer: transfer.success, transfer.failed, transfer.reversed (decision 26). */
    public const TRANSFER_SUCCEEDED = 'TRANSFER_SUCCEEDED';
    public const TRANSFER_FAILED = 'TRANSFER_FAILED';
    public const TRANSFER_REVERSED = 'TRANSFER_REVERSED';
    public const TRANSFER_KINDS = [self::TRANSFER_SUCCEEDED, self::TRANSFER_FAILED, self::TRANSFER_REVERSED];

    /** Signed and stored, but not acted on (disputes and anything else). */
    public const OTHER = 'OTHER';

    /**
     * @param string $kind         one of the constants above
     * @param string $providerType the provider's own event name, for the record
     * @param string $dedupKey     the same for every delivery of the same notification
     */
    public function __construct(
        public string $kind,
        public string $providerType,
        public string $dedupKey,
        public ?string $reference,
        public ?int $amountMinor,
        public ?string $currency,
        public ?int $feesMinor,
        public ?string $providerTransactionId,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
