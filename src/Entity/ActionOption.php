<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ActionOptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A choice a creator offers on a Request or Vote (domain model 4.3). Not versioned with
 * the configuration (contract item 57). Positions are 1..n, kept by the Block; see
 * PlaylistItem for why (action, position) is an index and not unique.
 */
#[ORM\Entity(repositoryClass: ActionOptionRepository::class)]
#[ORM\Table(name: 'action_options')]
#[ORM\UniqueConstraint(name: 'uniq_action_options_public_id', columns: ['public_id'])]
#[ORM\Index(name: 'idx_action_options_action_position', columns: ['creator_action_id', 'position'])]
class ActionOption
{
    public const STATUS_AVAILABLE = 'AVAILABLE';
    public const STATUS_UNAVAILABLE = 'UNAVAILABLE';

    public function __construct(string $publicId, CreatorAction $creatorAction, string $label, int $position, \DateTimeImmutable $now)
    {
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

    public function getCreatorAction(): CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLabel(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPosition(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isAvailable(): bool
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

    public function change(string $label, string $status, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function moveTo(int $position, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
