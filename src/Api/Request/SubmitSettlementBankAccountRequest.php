<?php

namespace App\Api\Request;

use App\Block\Settlement\BankAccountInput;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's SubmitSettlementBankAccountRequest (1.0.0-alpha.3, decision 26): a South
 * African bank account. `accountType`, `documentType` and `documentNumber` come together or
 * not at all; with them the server may verify the account with the provider at once.
 *
 * The account number and the document number are never echoed back, stored or logged; a
 * validation error names the field and a code only (FieldError drops the violation message).
 */
final readonly class SubmitSettlementBankAccountRequest implements RequestBody
{
    public const BANK_CODE_PATTERN = '/^[0-9A-Za-z]{2,20}$/D';
    public const ACCOUNT_NUMBER_PATTERN = '/^[0-9]{6,20}$/D';
    public const DOCUMENT_NUMBER_PATTERN = '/^[0-9A-Za-z]{4,30}$/D';
    public const HOLDER_NAME_MAX_LENGTH = 100;

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The document fields that are missing when some of them were given.
     *
     * @return list<string>
     */
    public function missingDocumentFields(): array
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
