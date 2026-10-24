<?php

namespace App\Config;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Encrypts configuration secrets kept in the database (ADR-040: payment gateway credentials),
 * so a database copy alone never reveals them.
 *
 * XChaCha20-Poly1305 (libsodium) under CONFIG_ENCRYPTION_KEY, 32 bytes in base64. A key of
 * its own, not APP_SECRET: rotating APP_SECRET must not make every stored credential
 * unreadable. The name of what is encrypted (for example "paystack/ZA/secret_key") is bound
 * as associated data, so a value cannot be copied from one row or field to another.
 *
 * Without a key nothing can be stored or read: whatever depends on it fails closed. The
 * committed .env leaves the key empty; dev and test use a fixed placeholder; a deployment sets
 * its own.
 */
final readonly class ConfigSecretBox
{

    public function __construct(
        #[Autowire(env: 'default::CONFIG_ENCRYPTION_KEY')]
        #[\SensitiveParameter]
        private ?string $key,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isAvailable(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ConfigSecretUnavailable without a valid key
     */
    public function seal(#[\SensitiveParameter] string $value, string $name): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ConfigSecretUnavailable without a valid key, or when the value was sealed with another key or name
     */
    public function open(string $sealed, string $name): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
