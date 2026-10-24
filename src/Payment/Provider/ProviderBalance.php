<?php

namespace App\Payment\Provider;

/**
 * The platform's balance with the provider in one currency, in minor units.
 */
final readonly class ProviderBalance
{
    public function __construct(public string $currency, public int $amountMinor)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
