<?php

namespace App\Api\Response;

use App\Block\Action\Page;
use App\Entity\Payout;
use App\Entity\SettlementProfile;

/**
 * The contract's settlement schemas (1.0.0-alpha.3): SettlementProfile, Payout and
 * PayoutPage. A destination is only ever shown masked: the bank's name, the last four digits
 * and the holder's name. Never the account number, the bank code or the recipient code.
 */
final class SettlementPresenter
{
    /**
     * Schema: SettlementProfile. A member without one gets the default DESTINATION_PENDING.
     *
     * @return array<string, mixed>
     */
    public static function profile(?SettlementProfile $profile): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function display(?string $bankName, ?string $last4): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: Payout.
     *
     * @return array<string, mixed>
     */
    public static function payout(Payout $payout): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PayoutPage.
     *
     * @param Page<Payout> $page
     *
     * @return array<string, mixed>
     */
    public static function payoutPage(Page $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
