<?php

namespace App\EventListener;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\EventSubscriber\CorrelationIdSubscriber;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Validator\Exception\ValidationFailedException;

/**
 * Turns any exception raised under /api/ into the error envelope of the API contract
 * (CONVENTIONS.md, section 8; the Problem schema of faka-v1.yaml).
 *
 * The exception message is never sent to the client: it can carry SQL, paths or
 * provider payloads. The client gets a fixed text per code and the correlation ID,
 * which is what support uses to find the real error in the logs. Only an
 * ApiProblemException chooses its own detail and field errors.
 */
final class ApiExceptionListener
{
    public const API_PREFIX = '/api/';

    // Priority -64: after Symfony has logged the exception (priority 0), and before
    // its own error renderer (priority -128) would produce an HTML page.
    #[AsEventListener(event: KernelEvents::EXCEPTION, priority: -64)]
    public function onKernelException(ExceptionEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
