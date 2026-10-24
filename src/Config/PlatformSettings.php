<?php

namespace App\Config;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\Member;
use App\Entity\PlatformSetting;
use App\Repository\PlatformSettingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The platform settings (PlatformSettingDefinitions): an operator's override where there is one,
 * otherwise the environment's value. Overrides are read at most every CACHE_SECONDS, so a
 * long-running worker sees a change without a restart.
 *
 * A secret setting is stored encrypted and never returned to the admin, only whether it is set.
 * Changes are audited with the old and new value, except a secret's.
 */
class PlatformSettings
{

    public function __construct(
        private readonly PlatformSettingRepository $settings,
        private readonly ConfigSecretBox $secrets,
        private readonly EntityManagerInterface $entityManager,
        private readonly AuditLogBlock $audit,
        private readonly ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function int(string $name, int $default): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function bool(string $name, bool $default): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function string(string $name, string $default): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** A secret setting's value; null without an override or when it cannot be opened. */
    public function secret(string $name, ?string $default = null): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * For the admin page: every definition, its environment default, and the override if any
     * (a secret's override is shown only as set).
     *
     * @return array<string, array{definition: array<string, mixed>, default: string, override: string|null, overridden: bool, updatedAt: \DateTimeImmutable|null}>
     */
    public function describe(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The stored override of a setting (sealed, for a secret); null without one.
     */
    public function override(string $name): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException for an unknown setting or a value that does not fit it
     */
    public function set(Member $admin, string $name, string $value): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Removes the override: the environment's value applies again.
     */
    public function clear(Member $admin, string $name): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
