<?php

namespace App\Repository;

use App\Entity\ProcessedEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProcessedEvent>
 */
class ProcessedEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function has(string $consumerName, string $eventId): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
