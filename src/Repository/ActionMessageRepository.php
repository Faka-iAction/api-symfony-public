<?php

namespace App\Repository;

use App\Entity\ActionMessage;
use App\Entity\CreatorAction;
use App\Entity\ParticipantAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActionMessage>
 */
class ActionMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?ActionMessage
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The messages sent to a Creator Action, newest first: for a moderator's review.
     *
     * @return list<ActionMessage>
     */
    public function findForCreatorAction(CreatorAction $action, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
