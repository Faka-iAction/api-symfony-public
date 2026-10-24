<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\VerificationChallengeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A one-time code that was requested for an email address or phone number.
 *
 * Not in the domain model, which only says that codes are not stored on the identifier.
 * A challenge is written for every request, including one that can never be completed
 * (sign-in for an unregistered identifier), so that the two cases cost the same work.
 * Only a keyed hash of the code is stored. A registration challenge also carries the
 * profile data of the request, because the member is created only when it is completed.
 */
#[ORM\Entity(repositoryClass: VerificationChallengeRepository::class)]
#[ORM\Table(name: 'verification_challenges')]
#[ORM\UniqueConstraint(name: 'uniq_verification_challenges_public_id', columns: ['public_id'])]
#[ORM\Index(name: 'idx_verification_challenges_identifier', columns: ['identifier_type', 'identifier_value', 'purpose'])]
#[ORM\Index(name: 'idx_verification_challenges_expires_at', columns: ['expires_at'])]
#[ORM\Index(name: 'idx_verification_challenges_member', columns: ['member_id'])]
class VerificationChallenge
{
    public const PURPOSE_REGISTRATION = 'REGISTRATION';
    public const PURPOSE_SIGN_IN = 'SIGN_IN';
    public const PURPOSE_ADD_IDENTIFIER = 'ADD_IDENTIFIER';

    public function __construct(
        string $publicId,
        string $purpose,
        string $identifierType,
        string $identifierValue,
        string $codeHash,
        \DateTimeImmutable $now,
        \DateTimeImmutable $expiresAt,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function forMember(Member $member): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function withPendingProfile(string $displayName, ?string $countryCode, ?string $preferredLanguage, ?string $passwordHash): void
    {
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

    public function getPurpose(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getIdentifierType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getIdentifierValue(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCodeHash(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPendingDisplayName(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPendingCountryCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPendingPreferredLanguage(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPendingPasswordHash(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAttempts(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpiresAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConsumedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getInvalidatedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
