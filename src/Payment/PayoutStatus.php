<?php

namespace App\Payment;

/**
 * The states of a payout (decision 26): FAKA paying a creator's payable amount from its
 * Paystack balance to the creator's verified destination. The contract's PayoutStatus shows
 * PENDING, PROCESSING, PAID, FAILED and REVERSED; SENDING and UNKNOWN are internal.
 *
 * - PENDING: recorded, its amount moved from the creator's entitlement to "payout in
 *   transit"; not sent yet.
 * - SENDING: a worker holds it and is asking the provider for the transfer.
 * - UNKNOWN: the request may or may not have reached the provider. It is verified with the
 *   provider by its reference and is never sent again on its own.
 * - PROCESSING: the provider accepted the transfer and has not finished it.
 * - PAID: the provider reported the transfer successful.
 * - FAILED: the provider refused or failed it; the amount is back in the entitlement.
 * - REVERSED: the provider returned a transfer it could not complete; the amount is back in
 *   the entitlement.
 */
final class PayoutStatus
{
    public const PENDING = 'PENDING';
    public const SENDING = 'SENDING';
    public const UNKNOWN = 'UNKNOWN';
    public const PROCESSING = 'PROCESSING';
    public const PAID = 'PAID';
    public const FAILED = 'FAILED';
    public const REVERSED = 'REVERSED';

    /** Not final: the amount is in transit. */
    public const IN_FLIGHT = [self::PENDING, self::SENDING, self::UNKNOWN, self::PROCESSING];
    public const FINAL = [self::PAID, self::FAILED, self::REVERSED];
    /** The contract's PayoutStatus values. */
    public const PUBLIC = [self::PENDING, self::PROCESSING, self::PAID, self::FAILED, self::REVERSED];

    /** What the contract shows for each state. */
    public static function public(string $status): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
