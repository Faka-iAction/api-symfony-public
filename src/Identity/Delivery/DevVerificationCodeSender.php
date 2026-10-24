<?php

namespace App\Identity\Delivery;

use App\Entity\MemberIdentifier;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * The dev environment's sender (config/services.yaml): a channel whose DSN is not configured
 * (empty or null://) keeps the logging sender, which never logs the code; a channel with a
 * DSN goes through the queue exactly as in prod.
 */
final readonly class DevVerificationCodeSender implements VerificationCodeSender
{
    public function __construct(
        private QueuedVerificationCodeSender $queued,
        private LoggingVerificationCodeSender $logging,
        #[Autowire(env: 'MAILER_DSN')]
        private string $mailerDsn,
        #[Autowire(env: 'SMS_DSN')]
        private string $smsDsn,
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

    public static function isConfigured(string $dsn): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
