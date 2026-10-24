<?php

namespace App\Country;

/**
 * Every configurable country field, declared in code (TIS 5.2: country policy is a class of
 * configuration of its own; architecture 16.2: each field states its domain, type,
 * validation, inheritance and overridability). A key that is not here cannot be stored or
 * resolved.
 *
 * The values themselves are not here: they are rows of `country_configurations` (or
 * columns of `countries` for the three fields held on the country record). Only the global
 * defaults of non-mandatory fields are code, and there are none yet: every field below is
 * either mandatory policy or held on the country record.
 *
 * Creator overrides: none of these fields is overridable at launch (domain model OQ-29,
 * proposal "create the table but allow no overridable fields").
 */
final class ConfigFieldRegistry
{
    /** The country's default currency. Held on `countries.default_currency`. */
    public const CURRENCY_DEFAULT = 'currency.default';
    /** The currencies Creator Action amounts may use. */
    public const CURRENCY_SUPPORTED = 'currency.supported';
    /** The country's default locale (UI and formatting defaults only; language is the member's choice, architecture 17). Held on `countries.default_language_id`. */
    public const LOCALE_DEFAULT = 'localization.default_locale';
    /** The country's IANA time zone, for display. Storage is UTC. Held on `countries.default_timezone`. */
    public const TIMEZONE = 'localization.timezone';
    /** The largest amount, in minor units, one Creator Action amount may have. Was ActionDefaults::POLICY_MAX_AMOUNT_MINOR. */
    public const MAX_ACTION_AMOUNT_MINOR = 'limits.max_action_amount_minor';
    /** Whether guests may take part in Creator Actions at all. Was ActionDefaults::DEFAULT_GUEST_PARTICIPATION_ALLOWED. */
    public const GUEST_PARTICIPATION_ALLOWED = 'participation.guest_allowed';
    /** The longest fulfilment period a creator may set: stands in for the settlement cool-off (architecture 8.1, 13.5). Was ActionDefaults::POLICY_MAX_FULFILMENT_PERIOD_SECONDS. */
    public const MAX_FULFILMENT_PERIOD_SECONDS = 'settlement.max_fulfilment_period_seconds';

    /**
     * @param list<ConfigField>|null $fields null for the platform's fields; a test may pass its own
     */
    public function __construct(?array $fields = null)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function has(string $key): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function get(string $key): ConfigField
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, ConfigField> by key, in declaration order
     */
    public function all(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<ConfigField>
     */
    public static function platformFields(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
