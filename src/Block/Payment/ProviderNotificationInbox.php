<?php

namespace App\Block\Payment;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Payout\PayoutBlock;
use App\Entity\Payment;
use App\Entity\Payout;
use App\Entity\ProviderNotification;
use App\Entity\ReconciliationIssue;
use App\Payment\PaymentState;
use App\Payment\Provider\PaymentProvider;
use App\Payment\Provider\ProviderEvent;
use App\Repository\PaymentRepository;
use App\Repository\ProviderNotificationRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;

/**
 * The inbox of provider notifications (TIS 8.4 and 14.3; architecture 43.3).
 *
 * Receiving (receive(), from the webhook endpoint): the signature is checked over the raw
 * body; the notification is written, committed, and only then acknowledged. A second
 * delivery of the same notification finds the stored row (unique provider and dedup key)
 * and is acknowledged again without a second row. Nothing is applied while the provider
 * waits for its answer.
 *
 * Processing (process(), processDue()): a worker leases each RECEIVED row, as the outbox
 * relay leases its rows, and applies it:
 *
 * - a successful charge: the payment named by the reference must exist and the reported
 *   amount and currency must equal the payment's; otherwise the notification is QUARANTINED,
 *   listed in reconciliation_exceptions and audited, and changes nothing. A matching one is
 *   then confirmed with the provider server to server (PaymentConfirmation::verifyAndApply,
 *   which also books the fee the provider reports); an answer that does not confirm yet is a
 *   transient failure and is retried;
 * - a refund status: the payment must have a refund of ours, for the same amount and
 *   currency; otherwise QUARANTINED as above;
 * - a transfer status (decision 26): the payout must exist, for the same amount and
 *   currency; otherwise QUARANTINED as above. A matching one is applied by PayoutBlock;
 * - anything else (disputes): IGNORED, kept for the record.
 *
 * A failure (the provider unreachable during verify, a database error, a lost race) is
 * counted on the row and retried after a backoff; after PAYMENTS_MAX_ATTEMPTS the row is DEAD
 * and listed for an operator. It is never marked processed when it was not. Applying is
 * idempotent: a duplicate or late notification finds the payment already in its state.
 */
final readonly class ProviderNotificationInbox
{
    public function __construct(
        private PaymentProvider $provider,
        private ProviderNotificationRepository $notifications,
        private PaymentRepository $payments,
        private PaymentConfirmation $confirmation,
        private RefundBlock $refunds,
        private PayoutBlock $payouts,
        private ReconciliationIssues $issues,
        private AuditLogBlock $audit,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private PaymentSettings $settings,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Checks and stores a notification. Returns only once it is committed.
     *
     * @param array<string, string> $headers lower-case header names
     *
     * @return array{int, bool} the row's key, and whether this delivery was the first
     *
     * @throws \App\Payment\Provider\InvalidSignature
     * @throws \App\Payment\Provider\ProviderNotConfigured
     */
    public function receive(string $rawBody, array $headers): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Processes every RECEIVED notification that is due.
     *
     * @return array{processed: int, quarantined: int, ignored: int, retried: int, dead: int}
     */
    public function processDue(int $limit = 100): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Processes one notification, if it is RECEIVED, due and not leased by another worker.
     *
     * @return 'processed'|'quarantined'|'ignored'|'retried'|'dead'|null null when nothing was done
     */
    public function process(int $id): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
