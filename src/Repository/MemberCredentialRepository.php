<?php

namespace App\Repository;

use App\Entity\Member;
use App\Entity\MemberCredential;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MemberCredential>
 */
class MemberCredentialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findActivePassword(Member $member): ?MemberCredential
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
