<?php

namespace App\Repository;

use App\Entity\SupportMessage;
use App\Entity\SupportTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SupportMessage>
 */
class SupportMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The conversation, oldest first.
     *
     * @return list<SupportMessage>
     */
    public function forTicket(SupportTicket $ticket): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
