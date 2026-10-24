<?php

namespace App\Repository;

use App\Action\ActionState;
use App\Entity\CreatorAction;
use App\Entity\CreatorActionConfig;
use App\Entity\Playlist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorActionConfig>
 */
class CreatorActionConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findCurrent(CreatorAction $action): CreatorActionConfig
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether the current configuration of a Creator Action that is not disabled uses the playlist.
     */
    public function isUsedByCurrentConfig(Playlist $playlist): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
