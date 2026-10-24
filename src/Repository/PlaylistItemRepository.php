<?php

namespace App\Repository;

use App\Entity\ActionRequest;
use App\Entity\Playlist;
use App\Entity\PlaylistItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlaylistItem>
 */
class PlaylistItemRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<PlaylistItem> in display order
     */
    public function findOrdered(Playlist $playlist): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findIn(Playlist $playlist, string $publicId): ?PlaylistItem
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<Playlist> $playlists
     *
     * @return array<int, int> item count by playlist key
     */
    public function countByPlaylist(array $playlists): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isInUse(PlaylistItem $item): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Reloads the item with a shared lock, so that its availability cannot change and it
     * cannot be deleted before the caller's submission commits.
     *
     * @return bool false when the item has been deleted meanwhile
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForChoice(PlaylistItem $item): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Locks the item for removal: a submission that chose it holds a shared lock until it
     * commits, so the removal waits for it and then sees the Request in isInUseLocked().
     *
     * @return bool false when the item has been deleted meanwhile
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForRemoval(PlaylistItem $item): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * isInUse() as a locking read (FOR SHARE): it sees a Request committed after the
     * transaction's snapshot was taken.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function isInUseLocked(PlaylistItem $item): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
