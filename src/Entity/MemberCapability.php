<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\MemberCapabilityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * What a member can do (domain model 3.4). The stored code is the code the API
 * contract returns from getOwnCapabilities.
 */
#[ORM\Entity(repositoryClass: MemberCapabilityRepository::class)]
#[ORM\Table(name: 'member_capabilities')]
#[ORM\UniqueConstraint(name: 'uniq_member_capabilities_member_capability', columns: ['member_id', 'capability'])]
#[ORM\Index(name: 'idx_member_capabilities_member', columns: ['member_id'])]
class MemberCapability
{
    public const MEMBER = 'MEMBER';
    public const CREATOR = 'CREATOR';

    public const STATUS_ACTIVE = 'ACTIVE';

    public function __construct(Member $member, string $capability, \DateTimeImmutable $now)
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

    public function getCapability(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getGrantedAt(): \DateTimeImmutable
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
}
