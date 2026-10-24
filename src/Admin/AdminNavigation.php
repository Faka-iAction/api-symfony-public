<?php

namespace App\Admin;

/**
 * The admin sections, and which roles may use each. The navigation lists only the sections
 * the signed-in admin's roles allow. It is presentation only: every page and action checks
 * its own roles on the server (RequiresAdminRole), whatever links are shown.
 */
final class AdminNavigation
{
    public const HOME = 'home';
    public const AUDIT = 'audit';
    public const OUTBOX = 'outbox';
    public const COUNTRIES = 'countries';
    public const MODERATION = 'moderation';
    public const PAYOUTS = 'payouts';
    public const PAYMENTS = 'payments';
    public const SUPPORT = 'support';
    public const MEMBERS = 'members';

    /** The roles of each section, for the controllers' RequiresAdminRole. */
    public const AUDIT_READ = [AdminRole::SUPPORT];
    public const OUTBOX_READ = [AdminRole::SUPPORT, AdminRole::OPERATIONS];
    public const OUTBOX_ACT = [AdminRole::OPERATIONS];
    public const COUNTRIES_READ = [AdminRole::SUPPORT, AdminRole::OPERATIONS];
    public const COUNTRIES_CHANGE = [AdminRole::OPERATIONS];
    public const MODERATION_ACT = [AdminRole::MODERATOR];
    /**
     * Payouts (decision 26): runs, payouts that need attention and payout details waiting for
     * review. Read only, plus "retry verification" and the review of a destination; no page
     * moves money.
     */
    public const PAYOUTS_OPERATE = [AdminRole::OPERATIONS];
    /** Payments: support looks a payment up for a complaint; operations also resolves reconciliation exceptions. */
    public const PAYMENTS_READ = [AdminRole::SUPPORT, AdminRole::OPERATIONS];
    public const PAYMENTS_RESOLVE = [AdminRole::OPERATIONS];
    /** Support tickets: reading, answering and moving them between states. */
    public const SUPPORT_ANSWER = [AdminRole::SUPPORT];
    /** Members: support looks an account up; a moderator blocks and unblocks it (ADR-039). */
    public const MEMBERS_READ = [AdminRole::SUPPORT, AdminRole::MODERATOR];
    public const MEMBERS_BLOCK = [AdminRole::MODERATOR];

    /**
     * @param list<AdminRole> $held
     *
     * @return array{current: string, roles: list<string>, sections: list<array{key: string, label: string, path: string}>}
     */
    public static function for(array $held, string $current): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<AdminRole> $held
     * @param list<AdminRole> $allowed
     */
    public static function holdsAny(array $held, array $allowed): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
