<?php

namespace App\EventListener;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorFailure;
use App\Block\Idempotency\IdempotencyException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Says how the API shows each refusal of the creator, discovery, follow, QR and
 * idempotency Blocks (CONVENTIONS.md, section 8.3). Same arrangement as
 * IdentityExceptionListener.
 */
final class CreatorExceptionListener
{
    // Priority 16: before Symfony logs the exception (priority 0) and before
    // ApiExceptionListener (-64) turns the result into the error envelope.
    #[AsEventListener(event: KernelEvents::EXCEPTION, priority: 16)]
    public function onKernelException(ExceptionEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
