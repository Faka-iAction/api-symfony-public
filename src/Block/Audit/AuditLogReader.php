<?php

namespace App\Block\Audit;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\AuditLog;
use App\Entity\Member;
use App\Repository\AuditLogRepository;

/**
 * Reading the audit log, for an admin (TIS 10.6: audit records are access-controlled). The
 * entries are shown as they were stored; they already hold no secret or contact detail
 * (AuditLogBlock). Nothing here changes an entry.
 *
 * Reading is itself recorded: an AUDIT_LOG_VIEWED entry with the admin and the filters
 * asked for, never the results.
 */
final readonly class AuditLogReader
{
    public function __construct(
        private AuditLogRepository $entries,
        private AuditLogBlock $audit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One page, newest first.
     *
     * @param int|null $beforeId the last entry of the previous page
     *
     * @return array{entries: list<AuditLog>, nextBefore: int|null}
     */
    public function read(Member $admin, AuditLogFilter $filter, ?int $beforeId, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
