<?php

namespace App\Block\Payment;

use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\ActionTransaction;
use App\Payment\Provider\PaymentProvider;
use App\Payment\Provider\ProviderException;
use App\Repository\ParticipantActionRepository;
use App\Repository\PaymentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;

/**
 * The payment worker's round (app:payments:process, for example every minute from cron):
 *
 * 1. the notification inbox: every RECEIVED notification that is due;
 * 2. refunds: every REQUESTED refund that is due is sent; refunds whose outcome is unknown,
 *    or that the provider is still working on, are looked up (never sent again);
 * 3. open payments past their checkout window are looked up with the provider, server to
 *    server, and confirmed, failed or expired on its answer; one the provider does not know
 *    is expired. Provider trouble leaves them PENDING for the next round;
 * 4. INITIATED Actions whose payments have all closed and whose windows have passed become
 *    FAILED.
 *
 * Every step is idempotent and safe to run in two workers at once.
 */
final readonly class PaymentProcessingBlock
{

    public function __construct(
        private ProviderNotificationInbox $inbox,
        private RefundBlock $refunds,
        private PaymentConfirmation $confirmation,
        private PaymentRepository $payments,
        private ParticipantActionRepository $participants,
        private PaymentProvider $provider,
        private ActionTransaction $transactions,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, int> what each step did
     */
    public function processAll(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
