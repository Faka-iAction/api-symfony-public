<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ActionMessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A participant's message: the body of a Shout-out (domain model 4.11). It passed the
 * automatic screening before it was stored (decision 22); the creator's review after
 * submission sets the moderation status.
 */
#[ORM\Entity(repositoryClass: ActionMessageRepository::class)]
#[ORM\Table(name: 'action_messages')]
#[ORM\UniqueConstraint(name: 'uniq_action_messages_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_action_messages_participant', columns: ['action_participant_id'])]
class ActionMessage
{
    public const PENDING = 'PENDING';
    public const APPROVED = 'APPROVED';
    public const REJECTED = 'REJECTED';

    public function __construct(string $publicId, ParticipantAction $participantAction, string $body, \DateTimeImmutable $now)
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

    public function getParticipantAction(): ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getBody(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getModerationStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getModeratedByMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getModeratedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDisplayedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param ?Member $by null when the system decided (no approval was required)
     */
    public function moderate(string $status, ?Member $by, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markDisplayed(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getHiddenAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isHidden(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether anyone but its author and the creator may be shown it: approved and not hidden.
     * Every future public display (the live overlay) must ask this.
     */
    public function isPubliclyShowable(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function hide(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
