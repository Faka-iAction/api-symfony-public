<?php

namespace App\Block\Payment;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\Payment;
use App\Entity\PaymentRefund;
use App\Entity\ProviderNotification;
use App\Entity\ReconciliationIssue;
use App\Entity\StateTransition;
use App\Payment\PaymentState;
use App\Repository\LedgerEntryRepository;
use App\Repository\PaymentRefundRepository;
use App\Repository\PaymentRepository;
use App\Repository\ProviderNotificationRepository;
use App\Repository\ReconciliationIssueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Payments for operators (MVP1 plan M5, "admin screens for payments, refunds, disputes and
 * reconciliation exceptions"): what needs a person's attention, one payment with everything
 * recorded about it, and resolving a reconciliation exception with a note.
 *
 * Read only except resolution, which is audited. Nothing here moves money, retries a
 * refund, changes a payment's state or edits an amount: the workers and the provider own
 * those (TIS 9). Payer identities are not shown: a payment holds no personal data beyond its
 * pseudonymous provider reference.
 */
final readonly class PaymentOperationsBlock
{
    public function __construct(
        private PaymentRepository $payments,
        private PaymentRefundRepository $refunds,
        private ReconciliationIssueRepository $issues,
        private ProviderNotificationRepository $notifications,
        private LedgerEntryRepository $ledger,
        private EntityManagerInterface $entityManager,
        private AuditLogBlock $audit,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{issues: list<ReconciliationIssue>, refunds: list<PaymentRefund>, notifications: list<ProviderNotification>}
     */
    public function needingAttention(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A payment by its public ID or by its provider reference, as an operator pastes either.
     */
    public function find(string $typed): ?Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{payment: Payment, refund: PaymentRefund|null, ledger: list<\App\Entity\LedgerEntry>, history: list<StateTransition>, issues: list<ReconciliationIssue>}
     */
    public function detail(Payment $payment): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException for an unknown exception, one that is not open, or no note
     */
    public function resolve(string $issueId, string $note, AuditActor $admin): ReconciliationIssue
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
