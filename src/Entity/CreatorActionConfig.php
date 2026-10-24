<?php

namespace App\Entity;

use App\Action\ActionConfig;
use App\Action\Money;
use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorActionConfigRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * The rules of a Creator Action at one version (domain model 4.2; decision 19).
 *
 * A row is written once and never changed: a change to the configuration is a new row
 * with the next version, and every participant Action keeps the row it was made under.
 * All amounts share the one `currency` column.
 */
#[ORM\Entity(repositoryClass: CreatorActionConfigRepository::class)]
#[ORM\Table(name: 'creator_action_configs')]
#[ORM\UniqueConstraint(name: 'uniq_creator_action_configs_version', columns: ['creator_action_id', 'version'])]
#[ORM\Index(name: 'idx_creator_action_configs_playlist', columns: ['playlist_id'])]
class CreatorActionConfig
{

    public function __construct(CreatorAction $creatorAction, int $version, ActionConfig $config, Member $createdBy, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorAction(): CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPlaylist(): ?Playlist
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedByMember(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function values(): ActionConfig
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
