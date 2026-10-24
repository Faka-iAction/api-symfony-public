<?php

namespace App\Identity\Delivery;

use App\Entity\MemberIdentifier;
use App\Identity\IdentitySettings;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

/**
 * Sends a code by email, through the Mailer transport that MAILER_DSN names. It talks to the
 * provider directly, so it runs in the worker only (DeliverVerificationCodeHandler), never
 * in an HTTP request.
 *
 * The transport is used rather than MailerInterface on purpose: the mailer would put a
 * SendEmailMessage, with the code in clear, on any queue that message is ever routed to.
 */
final readonly class EmailVerificationCodeSender implements VerificationCodeSender
{
    public function __construct(
        #[Autowire(service: 'mailer.transports')]
        private TransportInterface $transport,
        private VerificationCodeContent $content,
        private IdentitySettings $settings,
        #[Autowire(env: 'VERIFICATION_EMAIL_FROM')]
        private string $from,
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
