<?php

namespace App\Logging;

use App\EventSubscriber\CorrelationIdSubscriber;
use Monolog\Attribute\AsMonologProcessor;
use Monolog\LogRecord;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Adds the correlation ID of the current request to every log record, under the same
 * name the error envelope and the event envelope use.
 */
#[AsMonologProcessor]
final class CorrelationIdProcessor
{
    public const KEY = 'correlationId';

    public function __construct(private readonly RequestStack $requestStack)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function __invoke(LogRecord $record): LogRecord
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
