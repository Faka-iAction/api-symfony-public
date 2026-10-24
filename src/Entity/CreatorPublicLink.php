<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorPublicLinkRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A social or livestream link shown on a creator profile (domain model 5.2). The rows of
 * a profile are replaced as a whole and keep the order they were given in.
 */
#[ORM\Entity(repositoryClass: CreatorPublicLinkRepository::class)]
#[ORM\Table(name: 'creator_public_links')]
#[ORM\Index(name: 'idx_creator_public_links_profile', columns: ['creator_profile_id', 'position'])]
class CreatorPublicLink
{
    public const KIND_SOCIAL = 'SOCIAL';
    public const KIND_LIVESTREAM = 'LIVESTREAM';

    public function __construct(CreatorProfile $creatorProfile, string $kind, ?string $label, string $url, int $position, \DateTimeImmutable $now)
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

    public function getKind(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLabel(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUrl(): string
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
