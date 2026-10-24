<?php

namespace App\Block\Admin;

use App\Admin\AdminRole;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\AdminRoleGrant;
use App\Entity\Member;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\AdminRoleGrantRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Grants and revokes admin roles (TIS 10.2 and 10.6: a role grant is audited). The only
 * callers are the console commands app:admin:role:grant and app:admin:role:revoke: there is
 * no API operation and no web page for it, so no member can give themselves a role.
 *
 * Each change is written with its audit entry (ADMIN_ROLE_GRANTED or ADMIN_ROLE_REVOKED,
 * with the reason) and its event (AdminRoleGranted or AdminRoleRevoked, a proposed name) in
 * one transaction. Granting a role the member holds, or revoking one they do not hold,
 * changes and records nothing.
 *
 * Roles are read from the database on every admin request (rolesOf()), so a revocation
 * takes effect on the member's next request.
 */
final readonly class AdminRoleBlock
{
    public function __construct(
        private AdminRoleGrantRepository $grants,
        private EntityManagerInterface $entityManager,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<AdminRole>
     */
    public function rolesOf(Member $member): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $by     who grants it, as recorded on the row (for example `COMMAND app:admin:role:grant`)
     * @param string $reason why; never personal data
     *
     * @return bool false when the member already held the role
     *
     * @throws \InvalidArgumentException for an empty reason or a member who is not active
     */
    public function grant(Member $member, AdminRole $role, AuditActor $actor, string $by, string $reason): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return bool false when the member did not hold the role
     *
     * @throws \InvalidArgumentException for an empty reason
     */
    public function revoke(Member $member, AdminRole $role, AuditActor $actor, string $by, string $reason): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
