<?php

namespace App\Api\Response;

use App\Block\Action\Page;
use App\Block\Payment\PaymentView;
use App\Entity\LedgerEntry;
use App\Entity\PaymentRefund;
use App\Payment\LedgerAccount;

/**
 * The contract's payment and creator-money schemas: Payment, PaymentSummary, RefundSummary,
 * PaymentReceipt, PendingBalance, LedgerEntry and LedgerEntryPage. A payment as the payer
 * sees it carries no fee and no provider reference.
 */
final class PaymentPresenter
{
    public const PLATFORM_NAME = 'FAKA iAction';

    /**
     * Schema: Payment.
     *
     * @return array<string, mixed>
     */
    public static function payment(PaymentView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PaymentSummary.
     *
     * @return array<string, mixed>
     */
    public static function summary(PaymentView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PaymentReceipt. It names the creator paid and FAKA iAction as the platform
     * (architecture 13.1.1).
     *
     * @return array<string, mixed>
     */
    public static function receipt(PaymentView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: RefundSummary, or null.
     *
     * @return array<string, mixed>|null
     */
    public static function refund(?PaymentRefund $refund): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PendingBalance.
     *
     * @param array{asOf: \DateTimeImmutable, payoutEligibilityState: string, balances: list<array<string, mixed>>, cash: list<array{currency: string, confirmed: int, pendingConfirmation: int}>} $balance
     *
     * @return array<string, mixed>
     */
    public static function pendingBalance(array $balance): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: LedgerEntry. The amount is turned to the creator's side: positive adds to the
     * entitlement.
     *
     * @return array<string, mixed>
     */
    public static function ledgerEntry(LedgerEntry $entry): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: LedgerEntryPage.
     *
     * @param Page<LedgerEntry> $page
     *
     * @return array<string, mixed>
     */
    public static function ledgerEntryPage(Page $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
