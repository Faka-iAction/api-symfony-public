<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CreatorProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * The public creator identity at `/@handle` (domain model 3.5).
 *
 * The unique member makes "one creator profile per member" (decisions 12 and 15) a
 * database rule, not only an application one. City, languages and links are separate
 * entities. `handle` repeats the current row of the profile's handle history.
 */
#[ORM\Entity(repositoryClass: CreatorProfileRepository::class)]
#[ORM\Table(name: 'creator_profiles')]
#[ORM\UniqueConstraint(name: 'uniq_creator_profiles_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_creator_profiles_member', columns: ['member_id'])]
#[ORM\UniqueConstraint(name: 'uniq_creator_profiles_handle', columns: ['handle'])]
#[ORM\Index(name: 'idx_creator_profiles_category', columns: ['primary_category_id'])]
#[ORM\Index(name: 'idx_creator_profiles_discovery', columns: ['status', 'country_code'])]
// Full-text search (domain model 5.6). FULLTEXT on MySQL; a plain index elsewhere, unused.
#[ORM\Index(name: 'ftx_creator_profiles_search', columns: ['handle', 'display_name', 'bio'], flags: ['fulltext'])]
class CreatorProfile
{
    public const STATUS_PUBLISHED = 'PUBLISHED';
    public const STATUS_SUSPENDED = 'SUSPENDED';

    public const MANAGEMENT_SELF_MANAGED = 'SELF_MANAGED';

    public function __construct(
        string $publicId,
        Member $member,
        string $handle,
        string $displayName,
        ?string $bio,
        CreatorCategory $category,
        string $countryCode,
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

    public function getMember(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getHandle(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDisplayName(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getBio(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProfileImageRef(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPrimaryCategory(): ?CreatorCategory
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCountryCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getManagementType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isPublished(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether the public may see the profile: it is published and its owner's account
     * is in good standing. Everything public asks this one question.
     */
    public function isPubliclyVisible(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublishedAt(): ?\DateTimeImmutable
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

    public function changeDetails(string $displayName, ?string $bio, CreatorCategory $category, string $countryCode): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Only together with the profile's handle history, which is what reserves a handle. */
    public function rename(string $handle): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function touch(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Removes the profile from public view. A platform action; no API operation does it yet. */
    public function suspend(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function reinstate(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
