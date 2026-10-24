<?php

namespace App\Block\Payout;

/**
 * A creator's settlement figures in one currency, as PayoutEligibilityBlock derives them,
 * and the pending-balance figures of the contract that follow from them.
 */
final readonly class PayoutFigures
{
    /** The Settlement Profile allows a payout now. */
    public const ENABLED = 'ENABLED';
    /** PAYOUT_ENABLED, but under a payout hold after a change of destination. */
    public const HELD = 'HELD';
    /** No enabled Settlement Profile. */
    public const NO_DESTINATION = 'NO_DESTINATION';

    public function __construct(
        public string $currency,
        public int $inCoolOff,
        public int $awaitingFulfilment,
        public int $held,
        /** The entitlement less everything blocked; negative when the creator owes. */
        public int $available,
        public int $inTransit,
        public int $paidOut,
        public string $payoutState,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** What may be paid out now. */
    public function payable(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Recorded but not yet payable: cool-off, fulfilment, or no verified destination. */
    public function notYetEligible(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Blocked by a dispute, an open refund, or a payout hold. */
    public function heldTotal(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function owed(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function collected(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
