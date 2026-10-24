<?php

namespace App\Privacy;

/**
 * What an event payload and an audit record must never carry (events/README.md, "Privacy";
 * TIS 16.1; domain model 10.9): secrets, one-time codes, tokens, password and token hashes,
 * provider credentials and subjects, contact details, a guest's token, and the free text a
 * participant wrote. Things are referred to by public ID instead.
 *
 * Checked when an event or an audit record is built, so a mistake fails at once in the
 * tests rather than reaching a consumer. The check is by field name and by value shape: it
 * is a safety net, not a substitute for choosing the fields deliberately.
 */
final class SensitiveDataPolicy
{
    /** A field whose lowercased name contains one of these is refused. */
    public const FORBIDDEN_KEY_FRAGMENTS = [
        'password', 'secret', 'token', 'hash', 'code', 'otp', 'credential', 'cookie',
        'email', 'phone', 'contact', 'address', 'subject', 'value', 'message', 'note',
        'customfield', 'iban', 'card', 'nonce',
    ];

    public const REDACTED = '[redacted]';

    /**
     * @param array<mixed> $data
     *
     * @throws \LogicException naming the first field that must not be there
     */
    public static function assertSafe(array $data, string $what): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * For data that holds what people typed (an audit record of a profile change): a value
     * that looks like an email address, a phone number or a token is replaced, because a
     * person may put one in a display name or a bio. A forbidden field name is still a
     * programming error and is refused by assertSafe() afterwards.
     *
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     */
    public static function redactValues(array $data): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<mixed> $data
     */
    public static function firstProblem(array $data, string $path = ''): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
