<?php

namespace App\Identity\Delivery;

use App\Identity\Delivery\Message\DeliverVerificationCode;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Exception\UnrecoverableMessageHandlingException;

/**
 * Delivers a queued code (the worker side of QueuedVerificationCodeSender).
 *
 * In order: a code that has expired is not sent; a payload that cannot be opened is
 * dropped; a recipient over the daily cap is skipped silently; otherwise the code goes to
 * the email or SMS sender. A provider failure becomes VerificationDeliveryFailed, which
 * Messenger retries with backoff; after the last retry DeliveryGaveUpListener logs it.
 */
#[AsMessageHandler]
final readonly class DeliverVerificationCodeHandler
{
    public function __construct(
        private CodeSealer $sealer,
        private DailyDeliveryCap $cap,
        private RoutingVerificationCodeSender $sender,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function __invoke(DeliverVerificationCode $message): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
