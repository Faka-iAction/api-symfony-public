<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorLocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Where a creator works, for discovery (domain model 5.4). No private address is stored.
 *
 * The API contract knows one country and one city per creator, so every profile has
 * exactly one row here, the primary one. Its country repeats CreatorProfile::$countryCode.
 */
#[ORM\Entity(repositoryClass: CreatorLocationRepository::class)]
#[ORM\Table(name: 'creator_locations')]
#[ORM\Index(name: 'idx_creator_locations_profile', columns: ['creator_profile_id', 'is_primary'])]
#[ORM\Index(name: 'idx_creator_locations_place', columns: ['country_code', 'city'])]
class CreatorLocation
{

    public function __construct(CreatorProfile $creatorProfile, string $countryCode, ?string $city, \DateTimeImmutable $now)
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

    public function getCountryCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCity(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getArea(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isPrimary(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function move(string $countryCode, ?string $city, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
