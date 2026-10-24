<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\MemberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One registered member account (domain model 3.1). Sign-in identifiers, credentials and
 * capabilities are separate entities; nothing here says "fan" or "creator".
 */
#[ORM\Entity(repositoryClass: MemberRepository::class)]
#[ORM\Table(name: 'members')]
#[ORM\UniqueConstraint(name: 'uniq_members_public_id', columns: ['public_id'])]
class Member
{
    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_SUSPENDED = 'SUSPENDED';
    public const STATUS_CLOSED = 'CLOSED';

    public function __construct(
        string $publicId,
        ?string $displayName,
        ?string $countryCode,
        ?string $preferredLanguage,
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

    public function getDisplayName(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCountryCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPreferredLanguage(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isActive(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getClosedAt(): ?\DateTimeImmutable
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

    public function changeProfile(?string $displayName, ?string $countryCode, ?string $preferredLanguage, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function suspend(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Back to ACTIVE after a suspension (ADR-039: blocking is reversible). A closed account
     * is never reopened this way.
     *
     * @throws \DomainException unless SUSPENDED
     */
    public function reinstate(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
