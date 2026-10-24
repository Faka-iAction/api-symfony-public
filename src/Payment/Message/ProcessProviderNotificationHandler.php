<?php

namespace App\Payment\Message;

use App\Block\Payment\ProviderNotificationInbox;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Processes a notification soon after it is stored. A failure is recorded on the row and
 * retried by the inbox's own backoff (ProviderNotificationInbox), so this handler never
 * throws for one: the transport does not need to retry it.
 */
#[AsMessageHandler]
final readonly class ProcessProviderNotificationHandler
{
    public function __construct(private ProviderNotificationInbox $inbox)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function __invoke(ProcessProviderNotification $message): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
