<?php

namespace App\Block\Creator;

use App\Entity\CreatorFollow;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\CreatorFollowRepository;
use App\Repository\CreatorProfileRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\LockMode;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;

/**
 * Following creators. A follow names the creator's public identifier, never the handle,
 * so it survives a rename. Following and unfollowing are idempotent.
 *
 * UNDECIDED (CONVENTIONS.md section 14, item 32): a member may follow their own profile,
 * because the contract has no way to refuse it; follows of a creator who is no longer
 * public are kept but not listed.
 */
final readonly class FollowBlock
{
    public function __construct(
        private CreatorFollowRepository $follows,
        private CreatorProfileRepository $profiles,
        private CreatorViewLoader $views,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private ClockInterface $clock,
        private Outbox $outbox,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Following a creator already followed changes nothing, not even the time of the follow.
     *
     * @throws CreatorException CREATOR_NOT_FOUND unless the creator is publicly visible
     */
    public function follow(Member $member, string $creatorId): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether or not the member followed the creator, and whether or not it still exists.
     * CreatorUnfollowed is emitted only when a follow was removed.
     */
    public function unfollow(Member $member, string $creatorId): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many creators the member follows, counting only those list() would show.
     */
    public function count(Member $member): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether the member follows this creator, named by its public identifier.
     */
    public function isFollowing(Member $member, string $creatorId): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Most recently followed first.
     *
     * @param int $limit validated by the caller
     *
     * @throws CreatorException INVALID_CURSOR
     */
    public function list(Member $member, int $limit, ?string $cursor): FollowPage
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
