<?php

namespace App\Repository;

use App\Action\ActionState;
use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorAction>
 */
class CreatorActionRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Locks the Creator Action's row until the transaction ends and reloads it. Every writer
     * of a Creator Action, or of the participant Actions on it, takes this lock first: they
     * run one at a time, and always lock in the same order (Creator Action, then participant
     * Action), so they cannot deadlock each other.
     */
    public function lockForUpdate(CreatorAction $action): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOwn(CreatorProfile $profile, string $publicId): ?CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findBySlug(CreatorProfile $profile, string $slug): ?CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The owner's list: every state, most recently updated first.
     *
     * @return list<CreatorAction>
     */
    public function pageOwn(CreatorProfile $profile, ?string $state, ?string $type, ?CreatorAction $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The public list: PUBLISHED, ACTIVE and PAUSED only, newest first.
     *
     * @return list<CreatorAction>
     */
    public function pagePublic(CreatorProfile $profile, ?string $type, ?CreatorAction $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Creator Actions whose start or end time has been reached and whose state does not show it yet.
     *
     * @return list<CreatorAction>
     */
    public function findDueForTimeTransition(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
