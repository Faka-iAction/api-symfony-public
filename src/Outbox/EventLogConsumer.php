<?php

namespace App\Outbox;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * The one consumer so far: it writes the type and ID of each domain event it receives to
 * the log, once per event, and nothing of the payload. It proves the path from the outbox
 * through the relay and the transport to an idempotent consumer.
 */
#[AsMessageHandler]
final readonly class EventLogConsumer
{
    public const NAME = 'event-log';

    public function __construct(
        private ProcessedEvents $processed,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function __invoke(DomainEventMessage $message): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
