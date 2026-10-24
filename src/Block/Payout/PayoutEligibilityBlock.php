<?php

namespace App\Block\Payout;

use App\Action\ActionState;
use App\Entity\CreatorProfile;
use App\Entity\SettlementProfile;
use App\Payment\LedgerAccount;
use App\Payment\PaymentState;
use App\Repository\LedgerEntryRepository;
use App\Repository\PaymentRefundRepository;
use App\Repository\PayoutRepository;
use App\Repository\SettlementProfileRepository;
use Psr\Clock\ClockInterface;

/**
 * What of a creator's entitlement may be paid out, derived from the ledger when asked
 * (architecture 13.5 and 14.2; decision 26). Nothing here is stored.
 *
 * Per currency, the creator's entitlement now (E, the sum of every CREATOR_ENTITLEMENT line:
 * collections, fees, refunds, chargebacks and payouts already made) is split by what still
 * blocks the payments behind it. Only payments still CONFIRMED or DISPUTED can block:
 *
 * - DISPUTED, or CONFIRMED with a refund of ours requested or under way: `held`;
 * - CONFIRMED and confirmed less than PAYOUT_COOL_OFF_SECONDS ago: `inCoolOff`;
 * - CONFIRMED and its Action not fulfilled (a Tip completes on confirmation; every other
 *   Action, a Bid at any rank included, must be FULFILLED or COMPLETED): `awaitingFulfilment`.
 *
 * What is left, `available = E - held - inCoolOff - awaitingFulfilment`, is payable when the
 * creator's Settlement Profile is PAYOUT_ENABLED with no hold; under a payout hold it is held;
 * without an enabled profile it waits for settlement details. A negative `available` is
 * `owed`: a refund or chargeback after payout (a REFUNDED or REVERSED payment's lines bring E
 * down after the payout already took it out), recovered from later collections because no
 * payout is made while it lasts.
 *
 * Cash is never here: the cash memo accounts are not CREATOR_ENTITLEMENT (architecture 12.5.3).
 */
final readonly class PayoutEligibilityBlock
{
    public function __construct(
        private LedgerEntryRepository $entries,
        private PaymentRefundRepository $refunds,
        private PayoutRepository $payouts,
        private SettlementProfileRepository $settlementProfiles,
        private PayoutSettings $settings,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, PayoutFigures> by currency, sorted
     */
    public function figures(CreatorProfile $profile): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The amount that may be paid out now in the currency: zero unless the profile allows a
     * payout and the available amount is positive.
     */
    public function payable(CreatorProfile $profile, string $currency): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
