<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\MemberIdentifierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One identifier a member can sign in with (domain model 3.2).
 *
 * A row exists only once control of the identifier has been proved, so every row is
 * verified: a pending email address or phone number lives on its verification challenge.
 */
#[ORM\Entity(repositoryClass: MemberIdentifierRepository::class)]
#[ORM\Table(name: 'member_identifiers')]
#[ORM\UniqueConstraint(name: 'uniq_member_identifiers_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_member_identifiers_identity', columns: ['type', 'provider', 'value'])]
#[ORM\Index(name: 'idx_member_identifiers_member', columns: ['member_id'])]
class MemberIdentifier
{
    public const TYPE_EMAIL = 'EMAIL';
    public const TYPE_PHONE = 'PHONE';
    public const TYPE_SOCIAL = 'SOCIAL';

    public const STATE_VERIFIED = 'VERIFIED';

    /** Stored instead of NULL so that the unique constraint also covers email and phone rows. */
    public const NO_PROVIDER = '';

    /**
     * @param string $type  self::TYPE_EMAIL or self::TYPE_PHONE
     * @param string $value already normalised
     */
    public static function contact(string $publicId, Member $member, string $type, string $value, \DateTimeImmutable $now): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function social(
        string $publicId,
        Member $member,
        string $provider,
        string $subject,
        ?string $providerEmail,
        bool $providerEmailVerified,
        \DateTimeImmutable $now,
    ): self {
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

    public function getType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isSocial(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProvider(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getValue(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVerificationState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getVerifiedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderEmail(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isProviderEmailVerified(): ?bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isPrimaryContact(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLinkedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastUsedAt(): ?\DateTimeImmutable
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

    public function refreshProviderEmail(?string $providerEmail, bool $providerEmailVerified, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
