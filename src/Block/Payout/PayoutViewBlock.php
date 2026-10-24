<?php

namespace App\Block\Payout;

use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\CreatorAccess;
use App\Block\Action\Page;
use App\Block\Creator\Cursor;
use App\Entity\Member;
use App\Entity\Payout;
use App\Entity\PayoutRun;
use App\Repository\PayoutRepository;
use App\Repository\PayoutRunRepository;

/**
 * Read-only payout views: the creator's own payouts (listOwnPayouts, the web payouts page)
 * and the operators' view of runs and payouts needing attention. Nothing here moves money.
 */
final readonly class PayoutViewBlock
{
    public function __construct(
        private PayoutRepository $payouts,
        private PayoutRunRepository $runs,
        private CreatorAccess $access,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's payouts, most recent first.
     *
     * @return Page<Payout>
     *
     * @throws ActionException CAPABILITY_REQUIRED or INVALID_CURSOR
     */
    public function listOwn(Member $member, ?string $status, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<PayoutRun>
     */
    public function recentRuns(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Payout> failed, reversed, or of unknown outcome, most recent first
     */
    public function needingAttention(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
