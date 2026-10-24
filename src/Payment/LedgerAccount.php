<?php

namespace App\Payment;

/**
 * The ledger's accounts (architecture 14 and 62.5). Double entry: a debit is positive, a
 * credit negative, and each journal sums to zero.
 *
 * - CREATOR_ENTITLEMENT: what is owed to the creator (a liability; a credit raises it). The
 *   creator's view of an entry is its amount with the sign turned (positive adds to the
 *   entitlement), as the contract's LedgerEntry describes.
 * - PROVIDER_HELD_FUNDS: the platform's balance with the payment provider. It is the record of money the provider has, net of
 *   the provider's own fees. Not a wallet: no member can spend from it (architecture 14.2).
 * - PAYOUT_IN_TRANSIT: a payout recorded and not yet confirmed or returned by the provider
 *   (decision 26). Moved out of the creator's entitlement when the payout is recorded; out of
 *   the provider balance when it is paid; back to the entitlement when it fails or is reversed.
 * - PLATFORM_FEE_REVENUE: FAKA's platform fee.
 * - DIRECT_CASH_MEMO and DIRECT_CASH_ATTESTED: memo accounts for cash paid in person, directly
 *   to the creator (architecture 12.5.3 and 14). They record the creator's attestation, not
 *   money FAKA collected or holds: no balance, payout figure or reconciliation reads them.
 *   The creator's side is DIRECT_CASH_MEMO (a credit is cash the creator confirmed, shown
 *   positive like an entitlement); DIRECT_CASH_ATTESTED is its counterpart, so that every
 *   journal still sums to zero.
 */
final class LedgerAccount
{
    public const CREATOR_ENTITLEMENT = 'CREATOR_ENTITLEMENT';
    public const PROVIDER_HELD_FUNDS = 'PROVIDER_HELD_FUNDS';
    public const PLATFORM_FEE_REVENUE = 'PLATFORM_FEE_REVENUE';
    public const DIRECT_CASH_MEMO = 'DIRECT_CASH_MEMO';
    public const DIRECT_CASH_ATTESTED = 'DIRECT_CASH_ATTESTED';
    public const PAYOUT_IN_TRANSIT = 'PAYOUT_IN_TRANSIT';

    // The contract's LedgerEntryType values this backend writes.
    public const TYPE_ACTION_PAYMENT = 'ACTION_PAYMENT';
    public const TYPE_ACTION_REFUND = 'ACTION_REFUND';
    public const TYPE_PLATFORM_FEE = 'PLATFORM_FEE';
    public const TYPE_PAYMENT_PROCESSING_FEE = 'PAYMENT_PROCESSING_FEE';
    public const TYPE_DIRECT_CASH_RECEIPT_CONFIRMED = 'DIRECT_CASH_RECEIPT_CONFIRMED';
    public const TYPE_CASH_RECEIPT_REVERSAL_OR_CORRECTION = 'CASH_RECEIPT_REVERSAL_OR_CORRECTION';
    public const TYPE_CREATOR_PAYOUT = 'CREATOR_PAYOUT';
    /** The provider's fee for a payout transfer (contract 1.0.0-alpha.3). */
    public const TYPE_PAYOUT_FEE = 'PAYOUT_FEE';

    /** Every value of the contract's LedgerEntryType, for the list filter. */
    public const CONTRACT_TYPES = [
        'ACTION_PAYMENT', 'ACTION_REFUND', 'ACTION_SETTLEMENT', 'PLATFORM_FEE', 'CREATOR_PAYOUT', 'REFERRAL_REWARD',
        'REFERRAL_REVERSAL', 'REFERRAL_EXPIRY', 'PAYMENT_PROCESSING_FEE', 'DIRECT_CASH_RECEIPT_CONFIRMED',
        'CASH_RECEIPT_REVERSAL_OR_CORRECTION', 'FX_FEE', 'TAX_DEDUCTION', 'PAYOUT_FEE',
    ];
}
