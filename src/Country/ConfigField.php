<?php

namespace App\Country;

/**
 * One configurable field and the metadata architecture 16.2 asks of it: its domain, type,
 * validation, inheritance, whether it is mandatory policy, whether a creator may override
 * it, and its global default.
 *
 * Rules every definition must keep (checked here, so a bad definition cannot be loaded):
 *
 * - Mandatory policy has no global default and never inherits from the ZA/base country:
 *   each country states it explicitly, and a country that does not is refused (fail safe)
 *   rather than given a value nobody reviewed for it (architecture 16).
 * - A mandatory field that is overridable must say which way is stricter, so that an
 *   override can only narrow it.
 * - Anything else has a global default, so it always resolves to a reviewed value.
 * - A field held on the country record (currency, locale, time zone) is not overridable
 *   and is never inherited: each country row carries its own value.
 */
final readonly class ConfigField
{
    /**
     * @param string $key    stable configuration key, `domain.name`
     * @param string $domain configuration domain (domain model 8.2 `config_domain`)
     */
    public function __construct(
        public string $key,
        public string $domain,
        public FieldType $type,
        public bool $mandatoryPolicy,
        public bool $overridable,
        public mixed $globalDefault,
        public bool $inheritsFromBase,
        public Strictness $strictness,
        public bool $onCountryRecord,
        public string $description,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
