<?php

namespace App\Identity\Delivery\Message;

/**
 * Asks a worker to deliver one one-time code. Built by QueuedVerificationCodeSender.
 *
 * The recipient and the code are only in $sealed (see CodeSealer). Everything else here may
 * be logged: the verification ID is the public challenge ID, and the recipient appears only
 * masked and as a keyed fingerprint.
 *
 * Content is English only for now; the member's language is a later field here.
 */
final readonly class DeliverVerificationCode
{
    public const VERSION = 1;

    public function __construct(
        public string $verificationId,
        public string $identifierType,
        public string $purpose,
        public string $maskedRecipient,
        public string $recipientFingerprint,
        /** Unix time after which the code no longer works, so it is not worth sending. */
        public int $expiresAt,
        public string $sealed,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The fields the ciphertext is bound to.
     */
    public static function associatedData(string $verificationId, string $identifierType, string $purpose, string $recipientFingerprint, int $expiresAt): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function boundData(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{verificationId: string, identifierType: string, purpose: string, recipient: string}
     */
    public function logContext(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
