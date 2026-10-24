<?php

namespace App\Identity\Delivery;

use Psr\Log\LoggerInterface;

/**
 * Placeholder until an email and an SMS provider are chosen: it delivers nothing.
 *
 * It records that a code was due, without the code and without the address or number,
 * so nobody can complete a challenge through it.
 */
final readonly class LoggingVerificationCodeSender implements VerificationCodeSender
{
    public function __construct(private LoggerInterface $logger)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function send(string $identifierType, string $identifierValue, string $code, string $purpose, string $verificationId): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
