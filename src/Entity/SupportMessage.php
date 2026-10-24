<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\SupportMessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One message in a support ticket's conversation (domain model 10.8). Append-only: there is
 * no setter. Attachments are not taken in MVP1, so `attachment_refs` is not built.
 */
#[ORM\Entity(repositoryClass: SupportMessageRepository::class)]
#[ORM\Table(name: 'support_messages')]
#[ORM\Index(name: 'idx_support_messages_ticket', columns: ['support_ticket_id', 'id'])]
class SupportMessage
{

    public function __construct(SupportTicket $ticket, string $authorType, ?Member $authorMember, string $body, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTicket(): SupportTicket
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAuthorType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAuthorMember(): ?Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getBody(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSentAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
