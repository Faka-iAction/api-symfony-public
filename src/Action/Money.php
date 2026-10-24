<?php

namespace App\Action;

/**
 * The contract's Money: an integer count of minor units and an ISO 4217 code (CONVENTIONS.md, section 4).
 */
final readonly class Money
{
    public function __construct(
        public int $amountMinor,
        public string $currency,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{amountMinor: int, currency: string}
     */
    public function toArray(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
