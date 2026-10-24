<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CountryConfigOverrideRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A creator-level override of a configuration field that is explicitly overridable
 * (domain model 8.3; architecture 16). No field is overridable at launch (OQ-29), so
 * App\Block\Country\CountryConfigurationBlock refuses every override and no row is written;
 * the table exists so the model does not have to change when one is allowed. A row that
 * does exist for a field that is not overridable, or that would weaken mandatory policy, is
 * ignored by the resolver, which says so in its explanation.
 */
#[ORM\Entity(repositoryClass: CountryConfigOverrideRepository::class)]
#[ORM\Table(name: 'country_config_overrides')]
#[ORM\UniqueConstraint(name: 'uniq_country_config_overrides_profile_key_from', columns: ['creator_profile_id', 'config_key', 'effective_from'])]
#[ORM\Index(name: 'idx_country_config_overrides_set_by', columns: ['set_by_member_id'])]
class CountryConfigOverride
{

    public function __construct(CreatorProfile $creatorProfile, string $configKey, mixed $value, Member $setByMember, \DateTimeImmutable $effectiveFrom, ?\DateTimeImmutable $effectiveUntil, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorProfile(): CreatorProfile
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

    public function getEffectiveFrom(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSetByMember(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEffectiveUntil(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
