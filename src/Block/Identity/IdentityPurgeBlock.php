<?php

namespace App\Block\Identity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\MemberSession;
use App\Entity\VerificationChallenge;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Deletes the identity records that can no longer be used, once they are older than the
 * retention period:
 *
 * - verification challenges whose expiry lies further back than the retention. Consumed
 *   and replaced challenges expire like any other, so they go the same way;
 * - API sessions whose refresh token expired, or that were revoked, further back than the
 *   retention. A rotated session is kept until its own refresh token has expired, so that
 *   the reuse of an old refresh token is still recognised for as long as it matters.
 *
 * Each kind is removed with one statement, so running it again, or twice at once, only
 * finds nothing left to remove.
 */
final readonly class IdentityPurgeBlock
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param int $retention seconds a record is kept after it stopped being usable
     *
     * @return array{challenges: int, sessions: int} how many rows were deleted
     */
    public function purge(int $retention): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
