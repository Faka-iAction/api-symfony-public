<?php

namespace App\Block\Identity;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\Member;
use App\Entity\MemberIdentifier;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;

/**
 * The events and audit entries of the identity Blocks, in one place so that registration,
 * social sign-in and the identifier operations describe an identifier the same way.
 *
 * Each method only persists; the caller's flush writes the records in the transaction
 * that makes the change. An identifier is described by its public ID, its type and, for a
 * social login, its provider: never by the address, number or provider subject.
 */
final readonly class IdentityRecords
{
    public function __construct(
        private Outbox $outbox,
        private AuditLogBlock $audit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A new member and its first identifier (events/README.md: MemberRegistered, then
     * MemberIdentifierAdded for the first identifier too).
     */
    public function memberRegistered(Member $member, MemberIdentifier $first, bool $withPassword): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string|null $reason why it was attached, when it is not the member's own request
     *                            (`linked_by_verified_email` for a social login linked to an existing member)
     */
    public function identifierAdded(MemberIdentifier $identifier, ?string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function identifierRemoved(MemberIdentifier $identifier): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
