<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\SupportTicketRepository;
use App\Support\Support;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A support request (domain model 10.7; architecture 29), from a member or from a guest
 * session, never both. The conversation is its SupportMessages, the first of which is the
 * description. A related payment, when given, is one the person made.
 */
#[ORM\Entity(repositoryClass: SupportTicketRepository::class)]
#[ORM\Table(name: 'support_tickets')]
#[ORM\UniqueConstraint(name: 'uniq_support_tickets_public_id', columns: ['public_id'])]
#[ORM\Index(name: 'idx_support_tickets_member', columns: ['member_id', 'id'])]
#[ORM\Index(name: 'idx_support_tickets_guest', columns: ['guest_session_id', 'id'])]
#[ORM\Index(name: 'idx_support_tickets_status', columns: ['status', 'last_message_at'])]
class SupportTicket
{

    public function __construct(string $publicId, ?Member $member, ?GuestSession $guest, string $category, string $subject, ?Payment $relatedPayment, \DateTimeImmutable $now)
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

    public function getMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getGuestSession(): ?GuestSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCategory(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubject(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRelatedPayment(): ?Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastMessageAt(): \DateTimeImmutable
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

    /**
     * The person who asked wrote again: back to OPEN for support, whatever it was waiting for.
     *
     * @throws \DomainException once the ticket is CLOSED
     */
    public function requesterWrote(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Support wrote; the ticket then waits for the person unless support says otherwise.
     */
    public function supportWrote(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException for a state support may not set, or once CLOSED
     */
    public function moveTo(string $status, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
