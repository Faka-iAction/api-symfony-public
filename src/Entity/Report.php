<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Moderation\Moderation;
use App\Repository\ReportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A report by a member or a guest about a creator, a Creator Action or a message (domain
 * model 10.1; architecture 28). Exactly one reporter and exactly one subject, matching
 * `subject_type`: the constructors are the only way to make one, and each sets exactly one
 * of each. No contact detail is ever asked for or kept.
 */
#[ORM\Entity(repositoryClass: ReportRepository::class)]
#[ORM\Table(name: 'reports')]
#[ORM\UniqueConstraint(name: 'uniq_reports_public_id', columns: ['public_id'])]
#[ORM\Index(name: 'idx_reports_case', columns: ['moderation_case_id'])]
#[ORM\Index(name: 'idx_reports_reporter_member', columns: ['reporter_member_id'])]
#[ORM\Index(name: 'idx_reports_reporter_guest', columns: ['reporter_guest_session_id'])]
#[ORM\Index(name: 'idx_reports_creator_profile', columns: ['subject_creator_profile_id'])]
#[ORM\Index(name: 'idx_reports_creator_action', columns: ['subject_creator_action_id'])]
#[ORM\Index(name: 'idx_reports_action_message', columns: ['subject_action_message_id'])]
#[ORM\Index(name: 'idx_reports_state', columns: ['state', 'id'])]
class Report
{

    public static function aboutCreator(string $publicId, ?Member $member, ?GuestSession $guest, CreatorProfile $profile, string $reasonCode, ?string $details, ModerationCase $case, \DateTimeImmutable $now): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function aboutCreatorAction(string $publicId, ?Member $member, ?GuestSession $guest, CreatorAction $action, string $reasonCode, ?string $details, ModerationCase $case, \DateTimeImmutable $now): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function aboutMessage(string $publicId, ?Member $member, ?GuestSession $guest, ActionMessage $message, string $reasonCode, ?string $details, ModerationCase $case, \DateTimeImmutable $now): self
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

    public function getReporterMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReporterGuestSession(): ?GuestSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubjectType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubjectCreatorProfile(): ?CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubjectCreatorAction(): ?CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubjectActionMessage(): ?ActionMessage
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReasonCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDetails(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getModerationCase(): ?ModerationCase
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

    public function moveTo(string $state, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
