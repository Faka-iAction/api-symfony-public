<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorFollowRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A member following a creator (domain model 5.1). It points at the profile, not at the
 * handle, so it survives a rename.
 */
#[ORM\Entity(repositoryClass: CreatorFollowRepository::class)]
#[ORM\Table(name: 'creator_follows')]
#[ORM\UniqueConstraint(name: 'uniq_creator_follows_member_profile', columns: ['member_id', 'creator_profile_id'])]
#[ORM\Index(name: 'idx_creator_follows_profile', columns: ['creator_profile_id'])]
class CreatorFollow
{

    public function __construct(Member $member, CreatorProfile $creatorProfile, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getMember(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorProfile(): CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFollowedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
