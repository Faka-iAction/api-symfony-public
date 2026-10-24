<?php

namespace App\Block\Payment;

use App\Entity\Payment;
use App\Entity\Payout;
use App\Payment\LedgerAccount;
use App\Payment\PayoutStatus;
use App\Payment\Provider\PayoutProvider;
use App\Payment\Provider\PayoutsNotApproved;
use App\Payment\Provider\ProviderTransfer;
use App\Repository\LedgerEntryRepository;
use App\Repository\PayoutRepository;
use App\Entity\ReconciliationIssue;
use App\Payment\PaymentState;
use App\Payment\Provider\PaymentProvider;
use App\Payment\Provider\ProviderException;
use App\Payment\Provider\ProviderNotConfigured;
use App\Payment\Provider\ProviderTransaction;
use App\Payment\Provider\TransactionNotFound;
use App\Repository\PaymentRefundRepository;
use App\Repository\PaymentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Compares recent payments with what the provider says about each (architecture 62.5; TIS
 * 9.3: "reconciliation compares FAKA expected state with provider webhooks, reports and
 * settlement records and identifies missing events, duplicates, amount/currency mismatches,
 * reversals ..."). It only reads and lists: every difference goes to
 * reconciliation_exceptions for an operator, and nothing about a payment is changed here.
 * Repair is the worker's (app:payments:process) or an operator's.
 *
 * What counts as a difference, per platform state and provider answer:
 *
 * - provider paid (`success`): the platform must have it CONFIRMED or DISPUTED; an open
 *   payment still inside its checkout window is in flight, not a difference;
 * - provider reversed: the platform must have it REFUNDED or REVERSED, or CONFIRMED with a
 *   refund of its own under way; anything else is an unexpected reversal;
 * - provider failed, abandoned or unknown: the platform must not have it as collected;
 * - provider still pending: the platform must not have it as collected;
 * - and wherever the provider reports an amount and currency, they must be the payment's.
 *
 * Payouts (decision 26; reconcilePayouts()): each payout made in the period, and each still in
 * flight, is compared with the provider's verify answer. A final outcome that contradicts the
 * platform's (paid against failed or reversed, or a transfer the provider has no record of
 * while the platform has it as accepted or paid) is a PAYOUT_STATUS_MISMATCH; a different
 * amount or currency is an AMOUNT_MISMATCH. A platform payout still in flight that the
 * provider has finished is not a difference: the worker applies it.
 *
 * Balance (reconcileBalance()): FAKA's Paystack balance, per currency, must equal what the
 * ledger says the provider holds (the PROVIDER_HELD_FUNDS account: everything owed to
 * creators, everything in transit, and the platform's fee revenue not yet taken out); any
 * difference is a BALANCE_MISMATCH. A balance below what is owed to creators plus what is in
 * transit is also a BALANCE_SHORTFALL. Both are listed once per currency and day.
 */
final readonly class ReconciliationBlock
{

    public function __construct(
        private PaymentProvider $provider,
        private PayoutProvider $payoutProvider,
        private PayoutRepository $payouts,
        private LedgerEntryRepository $ledger,
        private PaymentRepository $payments,
        private PaymentRefundRepository $refunds,
        private ReconciliationIssues $issues,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{compared: int, mismatches: int, unavailable: int}
     *
     * @throws ProviderNotConfigured
     */
    public function reconcileSince(\DateTimeImmutable $since): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{compared: int, mismatches: int, unavailable: int}
     *
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     */
    public function reconcilePayouts(\DateTimeImmutable $since): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{currencies: int, mismatches: int}
     *
     * @throws ProviderNotConfigured
     * @throws PayoutsNotApproved
     * @throws ProviderException     the balance could not be read
     */
    public function reconcileBalance(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
