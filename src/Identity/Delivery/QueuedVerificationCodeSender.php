<?php

namespace App\Identity\Delivery;

use App\Identity\Delivery\Message\DeliverVerificationCode;
use App\Identity\IdentitySettings;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * The sender the HTTP path uses outside the tests: it only puts a sealed message on the
 * verification_code_delivery transport (config/packages/messenger.yaml). A worker delivers
 * it (DeliverVerificationCodeHandler), so how long a response takes does not depend on a
 * provider, and nothing a provider does reaches the caller.
 *
 * If the message cannot even be queued, that is logged and the caller still gets the
 * answer it would have had: a failure must not tell anyone that a code was due.
 */
final readonly class QueuedVerificationCodeSender implements VerificationCodeSender
{
    public function __construct(
        private MessageBusInterface $bus,
        private CodeSealer $sealer,
        private IdentitySettings $settings,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function send(
        string $identifierType,
        #[\SensitiveParameter]
        string $identifierValue,
        #[\SensitiveParameter]
        string $code,
        string $purpose,
        string $verificationId,
    ): void {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
