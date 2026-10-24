<?php

namespace App\Payment;

/**
 * The canonical payment states (architecture 13.3; contract PaymentState) and the refund
 * vocabulary (contract RefundStatus and RefundReason). Provider states are mapped onto these
 * by the adapter and never stored or shown.
 */
final class PaymentState
{
    public const CREATED = 'CREATED';
    public const PENDING = 'PENDING';
    public const CONFIRMED = 'CONFIRMED';
    public const FAILED = 'FAILED';
    public const EXPIRED = 'EXPIRED';
    public const REFUNDED = 'REFUNDED';
    public const DISPUTED = 'DISPUTED';
    public const REVERSED = 'REVERSED';
    public const ALL = [self::CREATED, self::PENDING, self::CONFIRMED, self::FAILED, self::EXPIRED, self::REFUNDED, self::DISPUTED, self::REVERSED];

    /** A payment whose outcome is not known yet: at most one per Action (createPayment). */
    public const OPEN = [self::CREATED, self::PENDING];
    /** States in which the money was collected at some point. */
    public const COLLECTED = [self::CONFIRMED, self::REFUNDED, self::DISPUTED, self::REVERSED];

    /**
     * Allowed moves. FAILED and EXPIRED may still become CONFIRMED: a provider's confirmation
     * can arrive late (contract getPayment; DN-25), and is then refunded if its Action closed.
     */
    public const TRANSITIONS = [
        self::CREATED => [self::PENDING, self::FAILED, self::EXPIRED],
        self::PENDING => [self::CONFIRMED, self::FAILED, self::EXPIRED],
        self::FAILED => [self::CONFIRMED],
        self::EXPIRED => [self::CONFIRMED],
        self::CONFIRMED => [self::REFUNDED, self::DISPUTED, self::REVERSED],
        self::DISPUTED => [self::CONFIRMED, self::REVERSED],
        self::REFUNDED => [],
        self::REVERSED => [],
    ];

    public const PURPOSE_INITIAL = 'INITIAL';
    /** A further payment for the difference that raises a ranked bid (architecture 7.4.1). */
    public const PURPOSE_BID_RAISE = 'BID_RAISE';

    /** The one online method code this backend offers (contract item 68 leaves codes to the server). */
    public const METHOD_CARD = 'CARD';

    public const REFUND_REQUESTED = 'REQUESTED';
    public const REFUND_SUBMITTED = 'SUBMITTED';
    public const REFUND_SUCCEEDED = 'SUCCEEDED';
    public const REFUND_FAILED = 'FAILED';
    /**
     * Internal, never shown: a refund request whose outcome at the provider is not known (a
     * timeout, a lost answer, a worker that died while sending). It is reconciled by asking
     * the provider and is never sent again on its own. Shown to the participant as SUBMITTED.
     */
    public const REFUND_UNKNOWN = 'UNKNOWN';
    /** Internal, never shown: a worker holds the request and is sending it. */
    public const REFUND_SENDING = 'SENDING';

    public const REASON_DEADLINE_EXPIRED = 'FULFILMENT_DEADLINE_EXPIRED';
    public const REASON_CREATOR_REJECTED = 'CREATOR_REJECTED';
    public const REASON_CREATOR_CANCELLED = 'CREATOR_CANCELLED';
    public const REASON_LATE_CONFIRMATION = 'LATE_CONFIRMATION';

    /** Close reason of an Action whose payment was never confirmed. */
    public const CLOSE_PAYMENT_NOT_CONFIRMED = 'PAYMENT_NOT_CONFIRMED';

    public static function canMove(string $from, string $to): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
