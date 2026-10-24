<?php

namespace App\Entity;

use App\Action\ActionState;
use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ParticipantActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One participant's interaction with one Creator Action (domain model 4.6, table
 * `action_participants`). It carries the Action state, never a payment state.
 *
 * Exactly one of member and guest session is set. The domain model's unique
 * (creator_action_id, idempotency_key) is not a constraint here: the contract scopes a key
 * to the caller (CONVENTIONS.md section 9), so two callers may use the same key, and
 * IdempotencyBlock is what makes a repeated submission return the first result.
 */
#[ORM\Entity(repositoryClass: ParticipantActionRepository::class)]
#[ORM\Table(name: 'action_participants')]
#[ORM\UniqueConstraint(name: 'uniq_action_participants_public_id', columns: ['public_id'])]
#[ORM\Index(name: 'idx_action_participants_action_state', columns: ['creator_action_id', 'state'])]
#[ORM\Index(name: 'idx_action_participants_recipient', columns: ['recipient_creator_profile_id', 'state'])]
#[ORM\Index(name: 'idx_action_participants_deadline', columns: ['state', 'fulfilment_deadline_at'])]
class ParticipantAction
{
    public const PAYMENT_METHOD_FREE = 'FREE';

    public function __construct(
        string $publicId,
        CreatorActionConfig $config,
        ?Member $member,
        ?GuestSession $guestSession,
        ?string $paymentMethod,
        ?int $amountMinor,
        ?string $currency,
        ?string $customFieldValue,
        string $idempotencyKey,
        \DateTimeImmutable $now,
    ) {
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

    public function getCreatorAction(): CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getConfig(): CreatorActionConfig
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getActionType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRecipientCreatorProfile(): CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getGuestSession(): ?GuestSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getState(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStateVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLockVersion(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPaymentMethod(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAmountMinor(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFulfilmentDeadlineAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCustomFieldValue(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubmittedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAcceptedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFulfilledAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFulfilledByMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getClosedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCloseReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getIdempotencyKey(): string
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

    public function isFree(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Only through ActionHistory, which validates and records the transition. Sets the
     * timestamp that belongs to the new state.
     *
     * @return int the new state version
     */
    public function moveTo(string $state, \DateTimeImmutable $now, ?string $closeReason = null): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The online method of the payment started for a paid Action. */
    public function choosePaymentMethod(string $method, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isPaid(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function setFulfilmentDeadline(?\DateTimeImmutable $deadline): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function recordFulfiller(Member $member): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
