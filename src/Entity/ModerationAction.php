<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ModerationActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One decision taken in a moderation case, by a moderator, with their reason (domain model
 * 10.3). Append-only: there is no setter, and a later decision is a new row.
 */
#[ORM\Entity(repositoryClass: ModerationActionRepository::class, readOnly: true)]
#[ORM\Table(name: 'moderation_actions')]
#[ORM\Index(name: 'idx_moderation_actions_case', columns: ['moderation_case_id'])]
#[ORM\Index(name: 'idx_moderation_actions_actor', columns: ['actor_member_id'])]
class ModerationAction
{

    public function __construct(ModerationCase $case, string $actionType, Member $actor, string $reason, ?string $targetRef, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getModerationCase(): ModerationCase
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActionType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActor(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReason(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTargetRef(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTakenAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
