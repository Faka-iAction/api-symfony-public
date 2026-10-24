<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\MemberSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One issued API token pair (domain model 3.9).
 *
 * Each refresh rotates to a new row that points back at the one it replaced. All rows
 * that descend from one sign-in share a family, which is what sign-out and the detection
 * of a reused refresh token revoke. Only hashes of the two tokens are stored.
 */
#[ORM\Entity(repositoryClass: MemberSessionRepository::class)]
#[ORM\Table(name: 'member_sessions')]
#[ORM\UniqueConstraint(name: 'uniq_member_sessions_token_hash', columns: ['token_hash'])]
#[ORM\UniqueConstraint(name: 'uniq_member_sessions_access_token_hash', columns: ['access_token_hash'])]
#[ORM\Index(name: 'idx_member_sessions_family', columns: ['family_id'])]
#[ORM\Index(name: 'idx_member_sessions_member', columns: ['member_id'])]
#[ORM\Index(name: 'idx_member_sessions_rotated_from', columns: ['rotated_from_id'])]
class MemberSession
{
    public const KIND_API = 'API';

    public function __construct(
        Member $member,
        string $familyId,
        string $refreshTokenHash,
        string $accessTokenHash,
        \DateTimeImmutable $now,
        \DateTimeImmutable $accessExpiresAt,
        \DateTimeImmutable $refreshExpiresAt,
        ?self $rotatedFrom = null,
    ) {
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

    public function getKind(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFamilyId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTokenHash(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAccessTokenHash(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAccessExpiresAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getIssuedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpiresAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRevokedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRotatedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRotatedFrom(): ?self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getClientInfo(): ?array
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

    /** Neither revoked nor replaced by a later pair. */
    public function isCurrent(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
