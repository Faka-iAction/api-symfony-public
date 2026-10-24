<?php

namespace App\Payment\Message;

/**
 * Asks a worker to process one stored provider notification. Only the row's key travels;
 * the row is the durable record, and a lost message is picked up by app:payments:process.
 */
final readonly class ProcessProviderNotification
{
    public function __construct(public int $notificationId)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
