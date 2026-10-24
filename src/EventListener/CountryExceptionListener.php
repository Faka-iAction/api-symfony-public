<?php

namespace App\EventListener;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Block\Country\CountryPolicyException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Country policy that cannot be resolved (missing or invalid mandatory policy) refuses the
 * operation: the API answers 503 SERVICE_UNAVAILABLE and nothing is written. The cause is
 * an operator's to fix, so it is logged with the country and the field, and the client is
 * told only that the service is unavailable. Same arrangement as the other listeners.
 *
 * The Blocks turn the refusals a request can cause (an unknown or inactive country in the
 * request) into their own failures before they get here.
 */
final readonly class CountryExceptionListener
{
    public function __construct(private LoggerInterface $logger)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[AsEventListener(event: KernelEvents::EXCEPTION, priority: 16)]
    public function onKernelException(ExceptionEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
