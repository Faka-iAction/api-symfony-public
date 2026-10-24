<?php

namespace App\Identity\Delivery;

use App\Entity\MemberIdentifier;

/**
 * Hands a code to the email or the SMS sender by the identifier's type. Runs in the worker.
 */
final readonly class RoutingVerificationCodeSender implements VerificationCodeSender
{
    public function __construct(
        private EmailVerificationCodeSender $email,
        private SmsVerificationCodeSender $sms,
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
