<?php

namespace App\Repository;

use App\Entity\Member;
use App\Entity\SettlementProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SettlementProfile>
 */
class SettlementProfileRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findForMember(Member $member): ?SettlementProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?SettlementProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Locks the row until the transaction ends and reloads it.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForUpdate(SettlementProfile $profile): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<SettlementProfile>
     */
    public function findInState(string $state, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Enabled profiles after the given key, oldest first: the payout run's candidates. The
     * hold is checked by the run, under the creator's lock.
     *
     * @return list<SettlementProfile>
     */
    public function findEnabledAfter(int $afterId, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
