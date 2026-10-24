<?php

namespace App\Block\Payment;

use App\Entity\Payment;
use App\Entity\PaymentRefund;

/**
 * A payment with its refund, if one was asked for.
 */
final readonly class PaymentView
{
    public function __construct(
        public Payment $payment,
        public ?PaymentRefund $refund,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
