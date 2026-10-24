<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\QrResourceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A short opaque code that the backend resolves to a current destination (domain model
 * 4.13; state machine: state-machines.md section 14).
 *
 * The code holds no handle and no financial instruction, and is never reused. Only a
 * creator profile can be a target so far: the columns for a Creator Action or a live
 * session come with those entities.
 *
 * The transitions are guarded here, so that no caller can skip a state; QrResourceBlock
 * adds the preconditions that need more than this row.
 */
#[ORM\Entity(repositoryClass: QrResourceRepository::class)]
#[ORM\Table(name: 'qr_resources')]
#[ORM\UniqueConstraint(name: 'uniq_qr_resources_short_code', columns: ['short_code'])]
#[ORM\Index(name: 'idx_qr_resources_profile', columns: ['creator_profile_id'])]
#[ORM\Index(name: 'idx_qr_resources_replaced_by', columns: ['replaced_by_qr_resource_id'])]
class QrResource
{
    public const STATE_GENERATED = 'GENERATED';
    public const STATE_ACTIVE = 'ACTIVE';
    public const STATE_SUSPENDED = 'SUSPENDED';
    public const STATE_EXPIRED = 'EXPIRED';
    public const STATE_REVOKED = 'REVOKED';
    public const STATE_REPLACED = 'REPLACED';

    public const KIND_STATIC_CREATOR = 'STATIC_CREATOR';
    public const TARGET_CREATOR_PROFILE = 'CREATOR_PROFILE';

    public function __construct(string $shortCode, CreatorProfile $creatorProfile, ?string $label, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getShortCode(): string
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

    public function getTargetType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The stored state. A code past its expiry time may still say ACTIVE here; see effectiveState(). */
    public function getState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The state as it is at the given moment: a code whose expiry time has passed is
     * expired whether or not anything has written that down yet.
     */
    public function effectiveState(\DateTimeImmutable $now): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLabel(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAttributionTag(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActivatedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSuspendedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRevokedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRevocationReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReplacedBy(): ?self
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

    /** GENERATED to ACTIVE, or SUSPENDED back to ACTIVE. */
    public function activate(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function suspend(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Makes the code temporary. The time may be moved while the code is not yet withdrawn. */
    public function limitValidity(\DateTimeImmutable $expiresAt, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function revoke(string $reason, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function replaceWith(self $successor, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
