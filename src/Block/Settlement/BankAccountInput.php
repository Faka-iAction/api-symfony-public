<?php

namespace App\Block\Settlement;

/**
 * Bank account details as the creator gives them, already checked for shape. The account
 * number and the document number exist only for the length of the request: they are passed
 * to the provider and dropped, and never stored, logged, evented or audited.
 */
final readonly class BankAccountInput
{
    public const ACCOUNT_TYPES = ['personal', 'business'];
    public const DOCUMENT_TYPES = ['identityNumber', 'passportNumber', 'businessRegistrationNumber'];

    public function __construct(
        public string $bankCode,
        #[\SensitiveParameter]
        public string $accountNumber,
        public string $accountHolderName,
        public ?string $accountType = null,
        public ?string $documentType = null,
        #[\SensitiveParameter]
        public ?string $documentNumber = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function last4(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Whether the owner's document was given, so that the provider can verify the account. */
    public function hasDocument(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Identifies the request in substance for idempotent replay, without the account number
     * or the document number: a hash of an account number is easily reversed, so none is kept.
     */
    public function fingerprint(): string
    {
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
