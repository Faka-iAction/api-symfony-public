<?php

namespace App\Repository;

use App\Admin\AdminRole;
use App\Entity\AdminRoleGrant;
use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdminRoleGrant>
 */
class AdminRoleGrantRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findFor(Member $member, AdminRole $role): ?AdminRoleGrant
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function lockForUpdate(AdminRoleGrant $grant): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The roles the member holds now, read from the database on every call: a revocation
     * takes effect on the member's next request, without signing them out.
     *
     * @return list<AdminRole>
     */
    public function activeRoles(Member $member): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
