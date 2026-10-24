<?php

namespace App\Payment\Message;

use App\Block\Payment\RefundBlock;
use App\Outbox\DomainEventMessage;
use App\Outbox\EventTypes;
use App\Repository\PaymentRefundRepository;
use App\Repository\PaymentRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Sends an automatic refund soon after it is requested: the PaymentRefundRequested event,
 * published by the outbox relay, names the payment. Sending is RefundBlock::send(), which
 * leases the refund first, so this consumer, a second delivery of the event and the
 * app:payments:process sweep can never send it twice. Other events are ignored.
 */
#[AsMessageHandler]
final readonly class RefundRequestedConsumer
{
    public function __construct(
        private PaymentRepository $payments,
        private PaymentRefundRepository $refunds,
        private RefundBlock $refundBlock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function __invoke(DomainEventMessage $message): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
