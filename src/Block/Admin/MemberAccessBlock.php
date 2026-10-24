<?php

namespace App\Block\Admin;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Identity\ContactIdentifier;
use App\Entity\Member;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\MemberIdentifierRepository;
use App\Repository\MemberRepository;
use App\Repository\MemberSessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Blocking a member (ADR-039): the member no longer has access to their account. Blocking
 * suspends the account and revokes every API session at once; the web session ends at the next
 * request, because the web user is reloaded on each one and a suspended member is not found.
 * A blocked creator's public pages are hidden, because a profile is public only while its owner
 * is active. Nothing the member made is deleted. Unblocking reinstates the account; the member
 * signs in again.
 *
 * Both are audited with the administrator and the reason, and evented with public IDs only.
 * An administrator cannot block their own account.
 */
final readonly class MemberAccessBlock
{
    public function __construct(
        private MemberRepository $members,
        private MemberIdentifierRepository $identifiers,
        private MemberSessionRepository $sessions,
        private EntityManagerInterface $entityManager,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A member by public ID, email address or phone number, as an operator types it.
     */
    public function find(string $typed): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException for the administrator's own account, one already blocked or closed, or no reason
     */
    public function block(string $memberId, Member $admin, string $reason): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException unless the account is blocked, or without a reason
     */
    public function unblock(string $memberId, Member $admin, string $reason): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
