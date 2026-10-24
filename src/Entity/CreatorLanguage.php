<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorLanguageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One language a creator works in (domain model 3.8). The rows of a profile are replaced
 * as a whole and keep the order they were given in.
 */
#[ORM\Entity(repositoryClass: CreatorLanguageRepository::class)]
#[ORM\Table(name: 'creator_languages')]
#[ORM\UniqueConstraint(name: 'uniq_creator_languages_profile_language', columns: ['creator_profile_id', 'language_code'])]
#[ORM\Index(name: 'idx_creator_languages_language', columns: ['language_code'])]
class CreatorLanguage
{

    public function __construct(CreatorProfile $creatorProfile, string $languageCode, int $position, \DateTimeImmutable $now)
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

    public function getLanguageCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPosition(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
