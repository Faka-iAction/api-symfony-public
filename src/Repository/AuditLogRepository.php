<?php

namespace App\Repository;

use App\Entity\AuditLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Reads only. The audit log is append-only: rows are added by AuditLogBlock, and nothing
 * here or anywhere else updates or deletes one. No API operation reads it yet; the admin
 * web pages read it through AuditLogReader, which builds its read query here (architecture 27).
 *
 * @extends ServiceEntityRepository<AuditLog>
 */
class AuditLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Oldest first.
     *
     * @return list<AuditLog>
     */
    public function findForTarget(string $targetType, string $targetPublicId): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
