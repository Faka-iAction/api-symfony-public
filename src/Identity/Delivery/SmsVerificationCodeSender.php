<?php

namespace App\Identity\Delivery;

use App\Entity\MemberIdentifier;
use App\Identity\IdentitySettings;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\Transport\TransportInterface;

/**
 * Sends a code by SMS, through the Notifier texter transport that SMS_DSN names. Which
 * provider that is depends only on the DSN and on the bridge package installed for it
 * (README, "Delivering one-time codes"). Runs in the worker only.
 *
 * The transport is used rather than TexterInterface for the same reason the email sender
 * avoids the mailer: the texter would queue an SmsMessage with the code in clear.
 */
final readonly class SmsVerificationCodeSender implements VerificationCodeSender
{
    public function __construct(
        #[Autowire(service: 'texter.transports')]
        private TransportInterface $transport,
        private VerificationCodeContent $content,
        private IdentitySettings $settings,
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
