<?php

namespace App\Payment\Provider;

/**
 * A request to verify a bank account against its owner (Paystack: Validate Account, South
 * Africa). The account number and the document number are passed through to the provider and
 * never stored or logged.
 */
final readonly class BankAccountValidation
{
    /**
     * @param string $accountType  personal or business
     * @param string $documentType identityNumber, passportNumber or businessRegistrationNumber
     */
    public function __construct(
        public string $bankCode,
        public string $countryCode,
        #[\SensitiveParameter]
        public string $accountNumber,
        public string $accountHolderName,
        public string $accountType,
        public string $documentType,
        #[\SensitiveParameter]
        public string $documentNumber,
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
