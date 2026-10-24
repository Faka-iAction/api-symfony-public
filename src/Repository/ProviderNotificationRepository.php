<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\ProviderNotification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProviderNotification>
 */
class ProviderNotificationRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<string> $statuses
     *
     * @return list<ProviderNotification>
     */
    public function findInStatuses(array $statuses, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByDedupKey(string $provider, string $dedupKey): ?ProviderNotification
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Counts one more delivery of a notification already stored. */
    public function countDelivery(int $id): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<int> keys of RECEIVED notifications that are due and not leased, oldest first
     */
    public function findDue(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** A worker's lease on a RECEIVED notification, as the outbox relay leases its rows. */
    public function claim(int $id, string $token, \DateTimeImmutable $now, \DateTimeImmutable $until): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Counts a failed processing attempt and releases the lease: retried from $next, or DEAD.
     */
    public function recordFailure(int $id, string $token, string $error, \DateTimeImmutable $now, \DateTimeImmutable $next, bool $dead): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function reload(int $id): ?ProviderNotification
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
