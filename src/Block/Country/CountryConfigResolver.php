<?php

namespace App\Block\Country;

use App\Country\ConfigField;
use App\Country\ConfigFieldRegistry;
use App\Country\CountryDefaults;
use App\Entity\Country;
use App\Entity\CreatorProfile;
use App\Repository\CountryConfigOverrideRepository;
use App\Repository\CountryConfigurationRepository;
use App\Repository\CountryRepository;
use Psr\Log\LoggerInterface;

/**
 * The effective value of a configuration field for a country at a moment (architecture 16
 * and 16.2; TIS 5.2), and how it was reached.
 *
 * Layers, in order; each one that has a valid value replaces the one before:
 *
 * 1. GLOBAL_DEFAULT: the registry's global default. Mandatory policy has none.
 * 2. BASE_COUNTRY: ZA's value, for another country, and only for a field that inherits.
 *    Mandatory policy never inherits.
 * 3. COUNTRY: the country's own effective version in `country_configurations`, or its
 *    `countries` row for currency, locale and time zone.
 * 4. CREATOR_OVERRIDE: the creator's effective override, only for a field marked
 *    overridable. For mandatory policy the override must narrow the country's value
 *    (Strictness); one that would relax it is refused and the policy value stands.
 *
 * Fail-safe: when mandatory policy has no value after layer 3, or the value in effect at
 * any layer fails validation, resolution throws CountryPolicyException. It never falls
 * back to a more permissive layer. A non-mandatory field whose value at a layer is invalid
 * keeps the value of the layer before, and the explanation says so.
 *
 * A country's status is not checked here: records made in a country that is now INACTIVE
 * still resolve its policy. Whether something new may be made in it is
 * CountryBlock::requireActive().
 */
final readonly class CountryConfigResolver
{
    public function __construct(
        private ConfigFieldRegistry $registry,
        private CountryRepository $countries,
        private CountryConfigurationRepository $configurations,
        private CountryConfigOverrideRepository $overrides,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function registry(): ConfigFieldRegistry
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param CreatorProfile|null $creator whose override applies, if any; the profile's country is not implied
     *
     * @throws CountryPolicyException UNKNOWN_FIELD, UNKNOWN_COUNTRY, POLICY_MISSING or POLICY_INVALID
     */
    public function resolve(string $countryCode, string $key, \DateTimeImmutable $at, ?CreatorProfile $creator = null): ResolvedValue
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Every field of the registry for a country, each resolved or with the refusal it gives.
     *
     * @return array<string, ResolvedValue|CountryPolicyException> by key
     *
     * @throws CountryPolicyException UNKNOWN_COUNTRY
     */
    public function resolveAll(string $countryCode, \DateTimeImmutable $at): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function show(mixed $value): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
