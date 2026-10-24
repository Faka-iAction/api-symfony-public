<?php

namespace App\EventListener;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Says how the API shows each refusal of the Creator Action, playlist, guest and
 * participation Blocks (CONVENTIONS.md, section 8.3). Same arrangement as
 * CreatorExceptionListener.
 */
final class ActionExceptionListener
{
    #[AsEventListener(event: KernelEvents::EXCEPTION, priority: 16)]
    public function onKernelException(ExceptionEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
