<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\AuditLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One privileged or security-relevant change: who, what, to what, when, and the changed
 * fields before and after (domain model 10.9; TIS 10.6; architecture 27, 62.11).
 *
 * Append-only. The entity is read-only to Doctrine (a loaded row is never written back),
 * has no setter, and App\Doctrine\AuditLogGuard refuses any update or removal that reaches
 * a flush. Nothing in the code base issues an UPDATE or DELETE on the table. The domain
 * model also asks that the runtime database identity cannot update or delete rows; that is
 * a grant on the server, not something the schema can express.
 *
 * The actor is referred to by public ID (a member or a guest session), or by name (a
 * console command). `changes` never holds a secret, code, token, hash or contact detail:
 * AuditLogBlock removes them before the row is built.
 */
#[ORM\Entity(repositoryClass: AuditLogRepository::class, readOnly: true)]
#[ORM\Table(name: 'audit_logs')]
#[ORM\Index(name: 'idx_audit_logs_target', columns: ['target_type', 'target_public_id', 'occurred_at'])]
#[ORM\Index(name: 'idx_audit_logs_actor', columns: ['actor_type', 'actor_public_id', 'occurred_at'])]
#[ORM\Index(name: 'idx_audit_logs_action', columns: ['action', 'occurred_at'])]
#[ORM\Index(name: 'idx_audit_logs_correlation_id', columns: ['correlation_id'])]
#[ORM\Index(name: 'idx_audit_logs_occurred_at', columns: ['occurred_at'])]
class AuditLog
{

    /**
     * @param array{before?: array<string, mixed>, after?: array<string, mixed>}|null $changes
     */
    public function __construct(
        string $actorType,
        ?string $actorPublicId,
        ?string $actorName,
        string $action,
        string $targetType,
        ?string $targetPublicId,
        ?array $changes,
        ?string $reason,
        string $correlationId,
        \DateTimeImmutable $occurredAt,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActorType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActorPublicId(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActorName(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAction(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTargetType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTargetPublicId(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{before?: array<string, mixed>, after?: array<string, mixed>}|null
     */
    public function getChanges(): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCorrelationId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOccurredAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
