<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\GuestSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A limited principal for a visitor who takes part without registering (domain model 3.10;
 * decision 23). Only a hash of the token is stored. Never a member.
 *
 * Conversion (domain model 3.10; architecture 5.1 and 5.2): `convertedMember` and
 * `convertedAt` are set only when a signed-in member explicitly confirms that this guest
 * session's Actions are theirs (GuestSessionBlock::convert()). The Actions keep their guest
 * reference and are linked to the member through the session; nothing is copied. The
 * receipt contact columns of the domain model are not here: the contract leaves guest
 * receipt contact out of scope (CONVENTIONS.md 14).
 */
#[ORM\Entity(repositoryClass: GuestSessionRepository::class)]
#[ORM\Table(name: 'guest_sessions')]
#[ORM\UniqueConstraint(name: 'uniq_guest_sessions_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_guest_sessions_token_hash', columns: ['token_hash'])]
#[ORM\Index(name: 'idx_guest_sessions_expires_at', columns: ['expires_at'])]
#[ORM\Index(name: 'idx_guest_sessions_converted_member', columns: ['converted_member_id'])]
class GuestSession
{

    public function __construct(string $publicId, string $tokenHash, ?string $countryCode, ?string $languageCode, \DateTimeImmutable $now, \DateTimeImmutable $expiresAt)
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

    public function getTokenHash(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCountryCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLanguageCode(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpiresAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastUsedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConvertedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConvertedMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isConverted(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Only through GuestSessionBlock::convert(), on the member's explicit confirmation.
     */
    public function convertTo(Member $member, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Decision 23: renewed on use. */
    public function renew(\DateTimeImmutable $now, \DateTimeImmutable $expiresAt): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
