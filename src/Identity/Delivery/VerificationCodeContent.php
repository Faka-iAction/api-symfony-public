<?php

namespace App\Identity\Delivery;

use Twig\Environment;

/**
 * The words of a code message. Plain and short: the product name, the code, how long it
 * works, and what to do if the person did not ask for it. No link, so nothing in the
 * message can sign anyone in by itself.
 *
 * English only. The member's preferred language (or the request's, for an identifier that
 * is not registered yet) is to be passed in once translations exist.
 */
final readonly class VerificationCodeContent
{
    public const PRODUCT = 'FAKA iAction';
    public const HTML_TEMPLATE = 'email/verification_code.html.twig';

    public function __construct(private Environment $twig)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function emailSubject(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function emailText(#[\SensitiveParameter] string $code, int $lifetimeSeconds): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function emailHtml(#[\SensitiveParameter] string $code, int $lifetimeSeconds): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One SMS segment: plain GSM-7 characters, well under 160 of them.
     */
    public function smsText(#[\SensitiveParameter] string $code, int $lifetimeSeconds): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * 600 becomes "10 minutes", 3600 "1 hour", 90 "90 seconds".
     */
    public static function lifetime(int $seconds): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
