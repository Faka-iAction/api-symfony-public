<?php

namespace App\Entity;

use App\Action\ActionState;
use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A configurable interaction a creator publishes (domain model 4.1).
 *
 * The current configuration is named by its version number rather than by a key of
 * creator_action_configs, which avoids a circular foreign key between the two tables;
 * (creator_action_id, version) is unique there, so the version identifies the row.
 * `stateVersion` increases on every state change and numbers the state history.
 */
#[ORM\Entity(repositoryClass: CreatorActionRepository::class)]
#[ORM\Table(name: 'creator_actions')]
#[ORM\UniqueConstraint(name: 'uniq_creator_actions_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_creator_actions_profile_slug', columns: ['creator_profile_id', 'slug'])]
#[ORM\Index(name: 'idx_creator_actions_state', columns: ['state'])]
class CreatorAction
{

    public function __construct(
        string $publicId,
        CreatorProfile $creatorProfile,
        string $actionType,
        string $slug,
        string $title,
        ?string $description,
        ?\DateTimeImmutable $startsAt,
        ?\DateTimeImmutable $endsAt,
        \DateTimeImmutable $now,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorProfile(): CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActionType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSlug(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTitle(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDescription(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStateVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConfigVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStartsAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEndsAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLockVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRankingVersion(): int
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

    public function isPubliclyListed(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Open for participation: ACTIVE, inside its window, on a public profile (decision 17).
     */
    public function isOpenAt(\DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function changeDetails(string $title, ?string $description, ?\DateTimeImmutable $startsAt, ?\DateTimeImmutable $endsAt, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function useConfigVersion(int $version, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Only through ActionHistory, which validates and records the transition.
     *
     * @return int the new state version
     */
    public function moveTo(string $state, \DateTimeImmutable $now): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
