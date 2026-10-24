<?php

namespace App\Logging;

use App\EventSubscriber\CorrelationIdSubscriber;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\Service\ResetInterface;

/**
 * The correlation ID that the state history, the outbox and the audit log record: the
 * current request's (the API's X-Correlation-Id), or, for work outside a request such as a
 * console command, one generated for the run and kept until the service is reset.
 */
final class CorrelationContext implements ResetInterface
{

    public function __construct(private readonly RequestStack $requests)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function current(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A long-running worker resets its services between messages, so that each one gets
     * its own correlation ID.
     */
    public function reset(): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
