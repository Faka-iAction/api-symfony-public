<?php

namespace App\Repository;

use App\Entity\CreatorProfile;
use App\Entity\Playlist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Playlist>
 */
class PlaylistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOwn(CreatorProfile $profile, string $publicId): ?Playlist
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Names are compared without regard to case, as MySQL's default collation does, so
     * that SQLite in the tests and MySQL in production agree.
     */
    public function findOwnByName(CreatorProfile $profile, string $name): ?Playlist
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * By name, then by key.
     *
     * @return list<Playlist>
     */
    public function pageOwn(CreatorProfile $profile, ?string $status, ?Playlist $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
