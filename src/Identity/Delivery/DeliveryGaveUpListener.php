<?php

namespace App\Identity\Delivery;

use App\Identity\Delivery\Message\DeliverVerificationCode;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Messenger\Event\WorkerMessageFailedEvent;
use Symfony\Component\Messenger\Stamp\RedeliveryStamp;

/**
 * Logs, at error level, a code that is given up on after the last retry: masked recipient,
 * never the code. Runs after Messenger's own retry listener has decided (priority 100).
 */
#[AsEventListener]
final readonly class DeliveryGaveUpListener
{
    public function __construct(private LoggerInterface $logger)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function __invoke(WorkerMessageFailedEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
