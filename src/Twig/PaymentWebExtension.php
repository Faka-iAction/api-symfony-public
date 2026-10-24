<?php

namespace App\Twig;

use App\Block\Payment\PaymentBlock;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Whether paying is available on this server: a payment provider key is configured. The
 * pages say "paying is not available yet" only when it is not.
 */
final class PaymentWebExtension extends AbstractExtension
{
    public function __construct(private readonly PaymentBlock $payments)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFunctions(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
