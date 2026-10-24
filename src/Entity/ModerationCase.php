<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Moderation\Moderation;
use App\Repository\ModerationCaseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A unit of moderation work: the reports about one subject and the decisions on them
 * (domain model 10.2).
 *
 * "At most one open case per subject" is a database rule: `open_subject_key` holds the
 * subject while the case is not CLOSED and is NULL once it is, and it is unique (MySQL
 * allows any number of NULLs in a unique index).
 */
#[ORM\Entity(repositoryClass: ModerationCaseRepository::class)]
#[ORM\Table(name: 'moderation_cases')]
#[ORM\UniqueConstraint(name: 'uniq_moderation_cases_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_moderation_cases_open_subject', columns: ['open_subject_key'])]
#[ORM\Index(name: 'idx_moderation_cases_status', columns: ['status', 'id'])]
#[ORM\Index(name: 'idx_moderation_cases_subject', columns: ['subject_type', 'subject_id'])]
class ModerationCase
{

    public function __construct(string $publicId, string $subjectType, int $subjectId, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function subjectKey(string $subjectType, int $subjectId): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubjectType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubjectId(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The subject while the case is open; null once it is closed. */
    public function getOpenSubjectKey(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isClosed(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAssignedTo(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getNotes(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEscalatedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getClosedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function startReview(Member $moderator, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function escalate(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function close(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function touch(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
