<?php

namespace App\Block\Country;

/**
 * The country policy a Creator Action's configuration is checked against: the effective
 * values for the creator's country at one moment (App\Block\Action\ConfigRules).
 */
final readonly class ActionPolicy
{
    /**
     * @param list<string> $supportedCurrencies
     */
    public function __construct(
        public string $countryCode,
        public array $supportedCurrencies,
        public int $maxAmountMinor,
        public int $maxFulfilmentPeriodSeconds,
        public bool $guestParticipationAllowed,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
