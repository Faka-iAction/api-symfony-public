<?php

namespace App\Api\Response;

use App\Block\Action\Page;
use App\Entity\CashReceipt;

/**
 * The contract's cash schemas: CashReceipt, CashReceiptSummary and CashReceiptPage. A cash
 * receipt is the creator's attestation; its platform fee and processing fee are always zero.
 */
final class CashPresenter
{
    /**
     * Schema: CashReceipt.
     *
     * @return array<string, mixed>
     */
    public static function receipt(CashReceipt $receipt): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: CashReceiptSummary, or null when cash was not chosen.
     *
     * @return array<string, mixed>|null
     */
    public static function summary(?CashReceipt $receipt): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: CashReceiptPage.
     *
     * @param Page<CashReceipt> $page
     *
     * @return array<string, mixed>
     */
    public static function page(Page $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
