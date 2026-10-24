<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorCategoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A creator type used for discovery (domain model 3.7). Platform configuration: the
 * rows, not the code, say which categories exist.
 */
#[ORM\Entity(repositoryClass: CreatorCategoryRepository::class)]
#[ORM\Table(name: 'creator_categories')]
#[ORM\UniqueConstraint(name: 'uniq_creator_categories_code', columns: ['code'])]
#[ORM\Index(name: 'idx_creator_categories_parent', columns: ['parent_id'])]
class CreatorCategory
{
    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_INACTIVE = 'INACTIVE';

    public function __construct(string $code, string $nameKey, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getNameKey(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getParent(): ?self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
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

    public function deactivate(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
