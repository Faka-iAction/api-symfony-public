<?php

namespace App\EventListener;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Block\Identity\IdentityException;
use App\Block\Identity\IdentityFailure;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Says how the API shows each refusal of an identity Block (CONVENTIONS.md, section 8.3).
 * The Blocks do not know about status codes, and the controllers stay free of try/catch.
 */
final class IdentityExceptionListener
{
    // Priority 16: before Symfony logs the exception (priority 0) and before
    // ApiExceptionListener (-64) turns the result into the error envelope.
    #[AsEventListener(event: KernelEvents::EXCEPTION, priority: 16)]
    public function onKernelException(ExceptionEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
