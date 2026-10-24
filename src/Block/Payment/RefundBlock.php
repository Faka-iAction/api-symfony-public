<?php

namespace App\Block\Payment;

use App\Block\Action\ActionFailure;
use App\Block\Action\ActionTransaction;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\ParticipantAction;
use App\Entity\Payment;
use App\Entity\PaymentRefund;
use App\Entity\ReconciliationIssue;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Payment\PaymentState;
use App\Payment\Provider\PaymentProvider;
use App\Payment\Provider\ProviderException;
use App\Payment\Provider\ProviderNotConfigured;
use App\Payment\Provider\ProviderOutcomeUnknown;
use App\Payment\Provider\ProviderRejected;
use App\Repository\ParticipantActionRepository;
use App\Repository\PaymentRefundRepository;
use App\Repository\PaymentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;

/**
 * Automatic full refunds (architecture 8.1 and 14.1; decisions 6, 8 and 18; TIS 8.2.2, 9.6).
 *
 * Asking: when an Action is rejected by the creator, expires unfulfilled, is cancelled
 * because its Creator Action was disabled, or a payment is confirmed after its Action closed,
 * request() records the refund in the same transaction as that change, under the Action's
 * row lock. There is one refund per payment (a unique key): asking again finds it. Nothing is
 * sent to the provider in that transaction.
 *
 * Sending: a worker (sendDue(), from app:payments:process and the PaymentRefundRequested
 * event) takes each REQUESTED refund with a committed lease (status SENDING) and only then
 * calls the provider:
 *
 * - accepted: SUBMITTED, or SUCCEEDED when the provider says so at once;
 * - a definite refusal: back to REQUESTED, sent again after a backoff, until the attempt
 *   limit, then FAILED for an operator;
 * - no usable answer: UNKNOWN. It is never sent again on its own: reconcileUnknown() asks the
 *   provider about the transaction, and the provider's refund notification settles it too. A
 *   worker that died while sending leaves the refund SENDING; once its lease has run out it
 *   is treated the same way.
 *
 * Completing (the provider's refund notification, or a verify answer that the transaction is
 * reversed while a refund of ours is outstanding): the payment becomes REFUNDED and the
 * compensating journal is posted, once.
 */
final readonly class RefundBlock
{
    public function __construct(
        private PaymentRepository $payments,
        private PaymentRefundRepository $refunds,
        private ParticipantActionRepository $participants,
        private PaymentStateMachine $states,
        private LedgerBlock $ledger,
        private ReconciliationIssues $issues,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private PaymentProvider $provider,
        private ActionTransaction $transactions,
        private EntityManagerInterface $entityManager,
        private PaymentSettings $settings,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Requests a full refund of every collected payment of the Action. The caller holds the
     * Action's row lock and commits. A payment still open is not refunded here: if it is
     * confirmed later, its Action is closed by then and the late confirmation refunds it.
     *
     * @return int how many refunds this call created
     */
    public function requestForAction(ParticipantAction $action, string $reason, ?string $causationId = null): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return bool false when the payment already has its refund, or is not confirmed
     */
    public function request(Payment $payment, string $reason, ?string $causationId = null): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function find(Payment $payment): ?PaymentRefund
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Sends every refund that is due.
     *
     * @return array{sent: int, retried: int, failed: int, unknown: int}
     */
    public function sendDue(int $limit = 100): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Sends one refund, if it is REQUESTED and due and no other worker holds it.
     *
     * @return 'sent'|'retried'|'failed'|'unknown'|null null when nothing was sent
     */
    public function send(int $refundId): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Refunds whose outcome at the provider is not known: a worker that died while sending
     * (its lease has run out) becomes UNKNOWN; each UNKNOWN one is looked up with the
     * provider. Only a definite answer changes it; nothing is ever sent again from here.
     *
     * @return int how many were settled
     */
    public function reconcileUnknown(int $limit = 100): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A refund status from a provider notification, applied under the Action's lock.
     */
    public function applyNotified(PaymentRefund $refund, string $status): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Applies a refund status the provider reported, in the caller's transaction, under the
     * Action's lock. Repeated or out-of-order reports change nothing once the refund is final.
     */
    public function applyProviderStatus(PaymentRefund $refund, string $status, ?string $providerRefundId, string $trigger): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
