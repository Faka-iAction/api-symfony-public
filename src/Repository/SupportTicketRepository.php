<?php

namespace App\Repository;

use App\Entity\GuestSession;
use App\Entity\Member;
use App\Entity\SupportTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SupportTicket>
 */
class SupportTicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?SupportTicket
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The requester's tickets, newest first.
     *
     * @return list<SupportTicket>
     */
    public function findOwn(?Member $member, ?GuestSession $guest, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * For support: tickets in the given states, the longest waiting first.
     *
     * @param list<string> $statuses
     *
     * @return list<SupportTicket>
     */
    public function findInStatuses(array $statuses, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
