<?php

namespace App\Identity\Delivery;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Protects what a queued delivery message must carry: the recipient and the code.
 *
 * The two are encrypted together with XChaCha20-Poly1305 (libsodium), under a key derived
 * from APP_SECRET with HKDF-SHA256. The message's own fields (verification ID, type,
 * purpose, expiry, fingerprint) are bound to the ciphertext as associated data, so they
 * cannot be swapped between messages. A queue dump, a delayed retry or a failure transport
 * therefore never holds a code or an address in clear.
 *
 * Changing APP_SECRET makes messages still in the queue unreadable. They are dropped; a
 * code lives for minutes, so the member asks for a new one.
 */
final readonly class CodeSealer
{

    public function __construct(
        #[Autowire('%kernel.secret%')]
        #[\SensitiveParameter]
        private string $secret,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return string base64 of nonce and ciphertext
     */
    public function seal(#[\SensitiveParameter] string $recipient, #[\SensitiveParameter] string $code, string $associatedData): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{string, string} recipient and code
     *
     * @throws \UnexpectedValueException when the payload was not sealed with this key and associated data
     */
    public function open(string $sealed, string $associatedData): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A keyed hash of the recipient: the same for every message to one address or number,
     * and useless without APP_SECRET. Used to count deliveries without storing the address.
     */
    public function fingerprint(string $identifierType, #[\SensitiveParameter] string $recipient): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
