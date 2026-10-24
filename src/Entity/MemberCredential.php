<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\MemberCredentialRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A secret a member holds for sign-in (domain model 3.3). Only its hash is stored.
 * A member with no row here is valid: they sign in with one-time codes or a social login.
 */
#[ORM\Entity(repositoryClass: MemberCredentialRepository::class)]
#[ORM\Table(name: 'member_credentials')]
#[ORM\Index(name: 'idx_member_credentials_member', columns: ['member_id'])]
class MemberCredential
{
    public const TYPE_PASSWORD = 'PASSWORD';

    public function __construct(Member $member, string $type, string $secretHash, \DateTimeImmutable $now)
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

    public function getType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSecretHash(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastUsedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRevokedAt(): ?\DateTimeImmutable
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

    public function markUsed(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function replaceHash(string $secretHash, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
