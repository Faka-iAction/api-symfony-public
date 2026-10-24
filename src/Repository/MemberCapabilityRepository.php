<?php

namespace App\Repository;

use App\Entity\Member;
use App\Entity\MemberCapability;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MemberCapability>
 */
class MemberCapabilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<string> the codes the member holds now, in the order they were granted
     */
    public function findActiveCodes(Member $member): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
