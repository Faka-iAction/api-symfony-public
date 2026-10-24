<?php

namespace App\Repository;

use App\Entity\CreatorLanguage;
use App\Entity\CreatorProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreatorLanguage>
 */
class CreatorLanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The language tags of several profiles in one query, each list in the order the
     * creator gave it.
     *
     * @param list<CreatorProfile> $profiles
     *
     * @return array<int, list<string>> by the internal key of the profile
     */
    public function codesFor(array $profiles): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function deleteFor(CreatorProfile $profile): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
