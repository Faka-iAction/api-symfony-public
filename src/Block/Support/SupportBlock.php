<?php

namespace App\Block\Support;

use App\Block\Action\GuestSessionBlock;
use App\Block\Action\Participant;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Entity\SupportMessage;
use App\Entity\SupportTicket;
use App\Identity\SecretFactory;
use App\Repository\PaymentRepository;
use App\Repository\SupportMessageRepository;
use App\Repository\SupportTicketRepository;
use App\Support\Support;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Support tickets (architecture 29; domain model 10.7, 10.8).
 *
 * The person who asks is a member or a guest session, and sees only their own tickets: any
 * other is the same NOT_FOUND as one that does not exist. A guest without a session gets one
 * when they first ask, as a guest's first report or participation does, so they can come back
 * to the conversation from the same browser. A related payment must be one they made.
 *
 * Support (ADMIN_SUPPORT) reads the queue, answers and moves a ticket between states; each
 * answer and each state change is audited, without the message text. Ticket text is never
 * put in an event or the audit log.
 */
final readonly class SupportBlock
{
    public function __construct(
        private SupportTicketRepository $tickets,
        private SupportMessageRepository $messages,
        private PaymentRepository $payments,
        private GuestSessionBlock $guests,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private AuditLogBlock $audit,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws SupportException INVALID_INPUT
     */
    public function open(?Member $member, ?GuestSession $guest, string $category, string $subject, string $body, ?string $paymentId): OpenedTicket
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<SupportTicket> newest first
     */
    public function listOwn(?Member $member, ?GuestSession $guest, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{ticket: SupportTicket, messages: list<SupportMessage>}
     *
     * @throws SupportException NOT_FOUND
     */
    public function conversation(?Member $member, ?GuestSession $guest, string $ticketId): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws SupportException NOT_FOUND, INVALID_INPUT or NOT_ALLOWED (closed)
     */
    public function reply(?Member $member, ?GuestSession $guest, string $ticketId, string $body): SupportTicket
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * For support: the tickets in these states, the longest waiting first.
     *
     * @param list<string> $statuses
     *
     * @return list<SupportTicket>
     */
    public function queue(array $statuses, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{ticket: SupportTicket, messages: list<SupportMessage>}
     *
     * @throws SupportException NOT_FOUND
     */
    public function forSupport(string $ticketId): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Support answers; the ticket then waits for the person, or takes the state given
     * (for example RESOLVED with the answer).
     *
     * @throws SupportException NOT_FOUND, INVALID_INPUT or NOT_ALLOWED
     */
    public function answer(Member $agent, string $ticketId, string $body, ?string $status): SupportTicket
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws SupportException NOT_FOUND or NOT_ALLOWED
     */
    public function moveTo(Member $agent, string $ticketId, string $status): SupportTicket
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
