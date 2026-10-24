<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\Member;
use App\Entity\VerificationChallenge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VerificationChallenge>
 */
class VerificationChallengeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?VerificationChallenge
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The most recent challenge for the identifier that nobody has completed. Used to
     * enforce the resend interval; a completed challenge proves control of the
     * identifier, so it does not hold back the next request.
     */
    public function findLatestOpen(string $purpose, string $identifierType, string $identifierValue, ?Member $member): ?VerificationChallenge
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function invalidateOpen(string $purpose, string $identifierType, string $identifierValue, ?Member $member, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Counts one attempt, unless the challenge has none left or is no longer open.
     * One statement, so that parallel guesses cannot exceed the limit.
     */
    public function claimAttempt(VerificationChallenge $challenge, int $maxAttempts, \DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Uses the challenge up. The pending password hash has been read by then and is cleared.
     */
    public function consume(VerificationChallenge $challenge, \DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
