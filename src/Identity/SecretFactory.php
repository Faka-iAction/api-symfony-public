<?php

namespace App\Identity;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Generates the random values of the identity slice and the hashes that are stored
 * in their place. Nothing produced here is ever logged.
 */
final readonly class SecretFactory
{

    public function __construct(
        #[Autowire('%kernel.secret%')]
        private string $appSecret,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A public identifier: 130 random bits. It looks like the contract's examples but,
     * unlike a ULID, carries no timestamp, so nothing can be inferred from it.
     */
    public function publicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An opaque bearer token: 256 random bits behind a prefix that says which kind it is.
     */
    public function token(string $prefix): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A token is long and random, so a plain digest is enough: there is nothing to guess.
     */
    public function hashToken(string $token): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Digits only: a code is typed by hand, often on a phone keypad.
     */
    public function verificationCode(int $length): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A code is short, so its digest alone could be reversed by trying every code. It is
     * keyed with the application secret, which is not in the database, and bound to its
     * challenge so that equal codes do not produce equal hashes.
     */
    public function hashVerificationCode(string $challengePublicId, #[\SensitiveParameter] string $code): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
