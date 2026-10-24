<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorHandleHistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Every handle a creator profile holds or has held (domain model 3.6, decision 11).
 *
 * The handle is unique across the whole table, current and former rows alike, which is
 * what keeps an old handle reserved: no other profile can ever insert it. Rows are never
 * deleted.
 */
#[ORM\Entity(repositoryClass: CreatorHandleHistoryRepository::class)]
#[ORM\Table(name: 'creator_handle_history')]
#[ORM\UniqueConstraint(name: 'uniq_creator_handle_history_handle', columns: ['handle'])]
#[ORM\Index(name: 'idx_creator_handle_history_profile', columns: ['creator_profile_id', 'is_current'])]
class CreatorHandleHistory
{

    public function __construct(CreatorProfile $creatorProfile, string $handle, \DateTimeImmutable $now)
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

    public function getHandle(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isCurrent(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAssignedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReplacedAt(): ?\DateTimeImmutable
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

    /** The creator renamed away from this handle. It stays reserved for them. */
    public function markReplaced(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The creator took a former handle of their own back. */
    public function markCurrentAgain(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
