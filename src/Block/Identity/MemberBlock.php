<?php

namespace App\Block\Identity;

use App\Entity\Member;
use App\Entity\MemberCapability;
use App\Identity\SecretFactory;
use App\Repository\MemberCapabilityRepository;
use App\Repository\MemberCredentialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * A member's own record: creating it, reading what goes with it, changing it.
 */
final readonly class MemberBlock
{
    public const DISPLAY_NAME = 'displayName';
    public const COUNTRY = 'country';
    public const LOCALE = 'locale';

    public function __construct(
        private MemberCapabilityRepository $capabilities,
        private MemberCredentialRepository $credentials,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Creates the member with the MEMBER capability. The caller attaches the first
     * sign-in identifier and flushes: a member never exists without one.
     *
     * @param string|null $displayName null only for a first social sign-in that gave no name
     */
    public function create(?string $displayName, ?string $country, ?string $locale): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function hasPassword(Member $member): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<string>
     */
    public function capabilities(Member $member): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Partial update: a key that is absent is left unchanged, a key that is present
     * replaces the value, and null clears it.
     *
     * @param array<self::*, string|null> $changes validated by the caller; displayName is never null
     *                                             (a name can be set, never removed)
     */
    public function update(Member $member, array $changes): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
