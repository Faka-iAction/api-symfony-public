<?php

namespace App\Payment\Provider;

/**
 * A registered transfer recipient: only what may be kept. The provider's answer also carries
 * the full account number, which is read past and never kept.
 */
final readonly class TransferRecipient
{
    public function __construct(
        public string $recipientCode,
        public ?string $bankName,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
