<?php

namespace App\Repository;

use App\Block\Creator\CreatorSearch;
use App\Creator\CreatorSearchText;
use App\Doctrine\FullTextMatch;
use App\Entity\CreatorLanguage;
use App\Entity\CreatorLocation;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorProfile>
 */
class CreatorProfileRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Locks the profile's row until the transaction ends and reloads it, so that two changes
     * to one profile run one after the other, each on what the other committed.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForUpdate(CreatorProfile $profile): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByMember(Member $member): ?CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Publicly visible profiles that match every filter that is set, newest first.
     *
     * Free text must match every word typed (CreatorSearchText). On MySQL the words the
     * full-text index on handle, display name and bio can answer go through it as prefixes
     * (domain model 5.6); the others, and every word on other databases, are contains-matches
     * with LIKE. Results stay newest first, not by relevance, so that paging by id is stable.
     *
     * @param CreatorProfile|null $after the last item of the previous page
     *
     * @return list<CreatorProfile>
     */
    public function search(CreatorSearch $search, ?CreatorProfile $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
