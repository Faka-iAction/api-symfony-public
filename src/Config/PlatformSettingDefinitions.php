<?php

namespace App\Config;

/**
 * The settings operators may override from the admin's Platform settings page (item 11 of the
 * product owner's list of 2026-10-24), without a release. Each takes its default from the
 * environment variable of the same name; an override in `platform_settings` wins.
 *
 * Only what is safe to change at run time is listed. Never here: the legal gate of decision 26
 * (PAYOUTS_LIVE_APPROVED), APP_SECRET, CONFIG_ENCRYPTION_KEY, database and queue addresses,
 * and payment gateway keys (those have their own page, ADR-040).
 *
 * type: int, bool, string, list (comma-separated) or secret (stored encrypted, never shown).
 */
final class PlatformSettingDefinitions
{
    /** @var array<string, array{section: string, label: string, help: string, type: string, min?: int, max?: int}> */
    public const ALL = [
        // Payouts (decisions 26 and 27). The legal gate is not here, on purpose.
        'PAYOUTS_COOL_OFF_SECONDS' => ['section' => 'Payouts', 'label' => 'Cool-off before a payment is payable (seconds)', 'help' => 'Mandatory; only its length changes (architecture 13.5).', 'type' => 'int', 'min' => 3600, 'max' => 7_776_000],
        'PAYOUTS_MINIMUM_MINOR' => ['section' => 'Payouts', 'label' => 'Smallest payout (cents)', 'help' => 'Amounts below it wait for the next run.', 'type' => 'int', 'min' => 0, 'max' => 10_000_000],
        'PAYOUTS_TRANSFER_FEE_MINOR' => ['section' => 'Payouts', 'label' => 'Provider fee per transfer (cents)', 'help' => 'What the provider charges for one payout.', 'type' => 'int', 'min' => 0, 'max' => 100_000],
        'PAYOUTS_FEE_BORNE_BY_CREATOR' => ['section' => 'Payouts', 'label' => 'The creator bears the transfer fee', 'help' => '', 'type' => 'bool'],

        // Risk and transaction limits (item 7: start from defaults).
        'RISK_PAYER_DAILY_LIMIT_MINOR' => ['section' => 'Risk limits', 'label' => 'Most one payer may pay in 24 hours (cents)', 'help' => 'Online payments started or confirmed, by member or guest session.', 'type' => 'int', 'min' => 0, 'max' => 1_000_000_000],
        'RISK_PAYER_HOURLY_COUNT' => ['section' => 'Risk limits', 'label' => 'Most payments one payer may start in an hour', 'help' => '', 'type' => 'int', 'min' => 1, 'max' => 10_000],
        'RISK_CREATOR_DAILY_LIMIT_MINOR' => ['section' => 'Risk limits', 'label' => 'Most one creator may receive in 24 hours (cents)', 'help' => 'Online payments started or confirmed for their Actions.', 'type' => 'int', 'min' => 0, 'max' => 10_000_000_000],

        // Communication and safety.
        'VERIFICATION_DELIVERY_DAILY_CAP' => ['section' => 'Sign-in codes', 'label' => 'Codes per address or number per day', 'help' => 'Past it the request gets the usual answer and no code is sent.', 'type' => 'int', 'min' => 1, 'max' => 1000],
        'SHOUT_OUT_SCREENING_BLOCKED_TERMS' => ['section' => 'Safety', 'label' => 'Words a Shout-out may not contain', 'help' => 'Comma-separated. Empty lets every message through.', 'type' => 'list'],

        // File storage (item 13).
        'FILE_STORAGE_PROVIDER' => ['section' => 'File storage', 'label' => 'Where uploaded files are kept', 'help' => 'local, aws or google. Changing it does not move files already stored.', 'type' => 'string'],
        'FILE_STORAGE_BUCKET' => ['section' => 'File storage', 'label' => 'Bucket (aws, google)', 'help' => '', 'type' => 'string'],
        'FILE_STORAGE_AWS_REGION' => ['section' => 'File storage', 'label' => 'AWS region', 'help' => 'For example af-south-1.', 'type' => 'string'],
        'FILE_STORAGE_AWS_KEY_ID' => ['section' => 'File storage', 'label' => 'AWS access key ID', 'help' => '', 'type' => 'string'],
        'FILE_STORAGE_AWS_SECRET' => ['section' => 'File storage', 'label' => 'AWS secret access key', 'help' => 'Stored encrypted; never shown again.', 'type' => 'secret'],
        'FILE_STORAGE_GOOGLE_CREDENTIALS' => ['section' => 'File storage', 'label' => 'Google service account (JSON)', 'help' => 'Stored encrypted; never shown again.', 'type' => 'secret'],
    ];

    public static function exists(string $name): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, int|string>|null
     */
    public static function definition(string $name): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function isSecret(string $name): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The value as typed, normalised; null when it does not fit the setting.
     */
    public static function normalise(string $name, string $value): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
