<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CountryConfigurationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One version of one configuration value for one country (domain model 8.2), effective
 * from a moment and, optionally, until one.
 *
 * Versions are never edited: a change is a new row with the next version. At a given
 * moment the value of a key is the ACTIVE row with the highest version whose period
 * contains that moment, so at most one version applies at any time, and a version dated in
 * the future applies only once its time comes (App\Block\Country\CountryConfigResolver).
 *
 * `mandatory_policy` and `creator_overridable` record what the field registry said when the
 * row was written, for the audit trail; the resolver always applies the registry's current
 * definition.
 *
 * The country is a code, not a foreign key, as in the domain model; the Block that writes a
 * row checks the country exists. There is no global row: global defaults are code
 * (App\Country\ConfigFieldRegistry).
 */
#[ORM\Entity(repositoryClass: CountryConfigurationRepository::class)]
#[ORM\Table(name: 'country_configurations')]
#[ORM\UniqueConstraint(name: 'uniq_country_configurations_version', columns: ['country_code', 'config_key', 'version'])]
#[ORM\Index(name: 'idx_country_configurations_lookup', columns: ['country_code', 'config_key', 'status', 'effective_from'])]
#[ORM\Index(name: 'idx_country_configurations_changed_by', columns: ['changed_by_member_id'])]
class CountryConfiguration
{
    public const STATUS_DRAFT = 'DRAFT';
    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_RETIRED = 'RETIRED';

    public function __construct(
        string $countryCode,
        string $configDomain,
        string $configKey,
        mixed $value,
        bool $mandatoryPolicy,
        bool $creatorOverridable,
        int $version,
        string $status,
        \DateTimeImmutable $effectiveFrom,
        ?\DateTimeImmutable $effectiveUntil,
        ?Member $changedByMember,
        string $changedBy,
        ?string $reason,
        \DateTimeImmutable $now,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCountryCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConfigDomain(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConfigKey(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getValue(): mixed
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isMandatoryPolicy(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isCreatorOverridable(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEffectiveFrom(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEffectiveUntil(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getChangedBy(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getChangedByMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
