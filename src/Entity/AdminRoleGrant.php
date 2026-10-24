<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\AdminRoleGrantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One administrative role of one member (App\Admin\AdminRole). A role is held while
 * `revoked_at` is empty.
 *
 * Kept apart from `member_capabilities` on purpose: capabilities are what the API contract
 * returns to the member (getOwnCapabilities, FAN and CREATOR), and an admin role must never
 * appear there or be changed through the paths that change capabilities.
 *
 * One row per member and role: granting a revoked role again re-activates the row. The
 * history of every grant and revocation, with who did it and why, is the audit log
 * (ADMIN_ROLE_GRANTED, ADMIN_ROLE_REVOKED) and the outbox (AdminRoleGranted,
 * AdminRoleRevoked); the row keeps only the latest of each.
 */
#[ORM\Entity(repositoryClass: AdminRoleGrantRepository::class)]
#[ORM\Table(name: 'admin_role_grants')]
#[ORM\UniqueConstraint(name: 'uniq_admin_role_grants_member_role', columns: ['member_id', 'role'])]
#[ORM\Index(name: 'idx_admin_role_grants_member', columns: ['member_id'])]
class AdminRoleGrant
{

    public function __construct(Member $member, string $role, string $grantedBy, string $reason, \DateTimeImmutable $now)
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

    public function getRole(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isActive(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getGrantedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getGrantedBy(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getGrantReason(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRevokedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRevokedBy(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRevokeReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** A revoked role granted again. */
    public function regrant(string $grantedBy, string $reason, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function revoke(string $revokedBy, string $reason, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
