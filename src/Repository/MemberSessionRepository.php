<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\Member;
use App\Entity\MemberSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MemberSession>
 */
class MemberSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByAccessTokenHash(string $hash): ?MemberSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * When the sign-in that started a token family happened: the oldest row the family still
     * has. Refreshing rotates to new rows of the same family, so a refreshed token does not
     * count as a new sign-in. The purge removes a row only once its own refresh token expired
     * a retention period ago, so the oldest row kept is never younger than the sign-in by
     * less than a refresh token's lifetime.
     */
    public function familySignedInAt(string $familyId): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByRefreshTokenHash(string $hash): ?MemberSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Marks the row as exchanged, but only if nobody exchanged or revoked it first.
     * One statement, so that two requests presenting the same refresh token cannot both win.
     */
    public function claimForRotation(MemberSession $session, \DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return int how many sessions this call revoked (0 when the family was already revoked)
     */
    /**
     * Ends every API session of the member at once (a blocked account, ADR-039).
     *
     * @return int how many sessions were revoked
     */
    public function revokeAllFor(Member $member, \DateTimeImmutable $now): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function revokeFamily(string $familyId, \DateTimeImmutable $now): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
