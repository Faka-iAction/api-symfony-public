<?php

namespace App\Country;

/**
 * What the country migration seeds, and the test database with it. Countries, languages
 * and configuration values are data, not code: this list exists only so that the migration
 * and the tests agree (CountryMigrationTest checks the migration's text against it).
 *
 * South Africa is the MVP1 base country and the only ACTIVE one (architecture 16). The
 * languages are the ones architecture 17 names for South Africa, plus en-ZA, the country's
 * default locale. ACTIVE on a language means the tag may be used; it says nothing about
 * translations, which do not exist yet.
 *
 * The configuration values are the provisional values that were constants in
 * App\Action\ActionDefaults. None of them is a decision.
 */
final class CountryDefaults
{
    /** The ZA/base country of architecture 16. */
    public const BASE_COUNTRY = 'ZA';

    /** When the seeded rows take effect: before anything the platform has recorded. */
    public const SEEDED_AT = '2026-10-01 00:00:00';

    /** code => name */
    public const LANGUAGES = [
        'en' => 'English',
        'en-ZA' => 'English (South Africa)',
        'zu' => 'isiZulu',
        'xh' => 'isiXhosa',
        'af' => 'Afrikaans',
    ];

    /** code => [name, default currency, default locale, time zone, status] */
    public const COUNTRIES = [
        'ZA' => ['South Africa', 'ZAR', 'en-ZA', 'Africa/Johannesburg', 'ACTIVE'],
    ];

    /** country => [key => value]; each becomes version 1, ACTIVE, from SEEDED_AT, mandatory as the registry says. */
    public const CONFIGURATION = [
        'ZA' => [
            ConfigFieldRegistry::CURRENCY_SUPPORTED => ['ZAR'],
            // R100,000.00: the placeholder that was ActionDefaults::POLICY_MAX_AMOUNT_MINOR.
            ConfigFieldRegistry::MAX_ACTION_AMOUNT_MINOR => 10_000_000,
            ConfigFieldRegistry::GUEST_PARTICIPATION_ALLOWED => true,
            // 7 days: the placeholder that was ActionDefaults::POLICY_MAX_FULFILMENT_PERIOD_SECONDS.
            ConfigFieldRegistry::MAX_FULFILMENT_PERIOD_SECONDS => 604_800,
        ],
    ];

    public static function seededAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
