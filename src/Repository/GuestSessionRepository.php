<?php

namespace App\Repository;

use App\Entity\GuestSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GuestSession>
 */
class GuestSessionRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Locks the guest session and reloads it, so that a conversion decided under the lock
     * sees a conversion another request committed meanwhile.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForUpdate(GuestSession $session): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
