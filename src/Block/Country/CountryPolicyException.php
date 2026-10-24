<?php

namespace App\Block\Country;

/**
 * A refusal of the country configuration Blocks. The message is for operators and logs:
 * it names the country and the field, never personal data.
 */
final class CountryPolicyException extends \RuntimeException
{
    public function __construct(
        public readonly CountryPolicyFailure $failure,
        public readonly string $countryCode,
        public readonly ?string $configKey,
        string $message,
        ?\Throwable $previous = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
