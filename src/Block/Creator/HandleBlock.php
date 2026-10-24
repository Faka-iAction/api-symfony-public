<?php

namespace App\Block\Creator;

use App\Creator\CreatorDefaults;
use App\Entity\CreatorHandleHistory;
use App\Entity\CreatorProfile;
use App\Repository\CreatorHandleHistoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Handles: who holds one, whether one can be taken, and renaming (decision 11;
 * CONVENTIONS.md section 3, "Renamed handles").
 *
 * Every handle a profile has ever held stays in its history and is never released, so
 * no other profile can take it. The methods that change something only persist; the
 * caller flushes them together with the rest of its transaction.
 */
final readonly class HandleBlock
{
    /**
     * UNDECIDED (CONVENTIONS.md section 14, item 48): may a creator rename back to one of
     * their own former handles? The contract's redirect design assumes so, and so does
     * this default. It is the only place the answer is given: set it to false and a
     * creator's former handles become as unavailable to them as to everyone else.
     */
    public const OWNER_MAY_TAKE_BACK_FORMER_HANDLE = true;

    public function __construct(
        private CreatorHandleHistoryRepository $history,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The stored form of a handle as somebody asked for it, or null when it cannot be a
     * handle at all. Matching is case-insensitive; only ASCII is lowered, so that no
     * other letter can be turned into one that the handle rules allow.
     */
    public static function normalise(string $requested): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The history row of a handle, current or former, whoever holds it.
     */
    public function holderOf(string $handle): ?CreatorHandleHistory
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param CreatorProfile|null $profile the profile that wants the handle; null for a new one
     */
    public function isAvailableTo(string $handle, ?CreatorProfile $profile): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Records the handle a new profile starts with.
     */
    public function assignFirst(CreatorProfile $profile): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Moves the profile to another handle. The one it leaves stays reserved for it.
     * The caller has checked isAvailableTo().
     */
    public function rename(CreatorProfile $profile, string $handle): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
