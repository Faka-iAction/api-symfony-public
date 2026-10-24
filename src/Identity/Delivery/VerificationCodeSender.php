<?php

namespace App\Identity\Delivery;

/**
 * Delivers a one-time code to an email address or phone number.
 *
 * An implementation must never write the code to a log.
 */
interface VerificationCodeSender
{
    /**
     * @param string $identifierType  MemberIdentifier::TYPE_EMAIL or MemberIdentifier::TYPE_PHONE
     * @param string $identifierValue the normalised address or E.164 number
     * @param string $purpose         one of the VerificationChallenge::PURPOSE_* values
     */
    public function send(string $identifierType, string $identifierValue, string $code, string $purpose, string $verificationId): void;
}
