<?php

namespace App\Payment\Provider;

/**
 * A bank account to register as a transfer recipient. The account number is passed through
 * to the provider and never stored or logged.
 */
final readonly class BankRecipient
{
    public function __construct(
        public string $accountHolderName,
        #[\SensitiveParameter]
        public string $accountNumber,
        public string $bankCode,
        public string $currency,
        public string $description,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, string>
     */
    public function __debugInfo(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
