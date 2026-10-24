<?php

namespace App\Controller\Web;

use App\Block\Action\ActionException;
use App\Block\Action\IncomingActionBlock;
use App\Block\Action\ParticipantView;
use App\Block\Payment\LedgerBlock;
use App\Entity\LedgerEntry;
use App\Entity\Member;
use App\Payment\LedgerAccount;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Earnings (ui-spec 8.15, screenshots 37 and 38): Settled and Pending, the total, and the
 * payments under All | Pending | Settled. The same Block as the API's getOwnPendingBalance
 * and listOwnLedgerEntries.
 *
 * Settled is what was paid out; Pending is what was received and not yet paid out. The
 * ledger has no per-payment "settled" flag, so payments are shown as settled oldest first,
 * up to the share of what was collected that has been paid out, as the app does.
 */
final class EarningsController extends CreatorAreaController
{

    public function __construct(
        private readonly LedgerBlock $ledger,
        private readonly IncomingActionBlock $incoming,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/earnings', name: 'web_creator_earnings', methods: [Request::METHOD_GET])]
    public function __invoke(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
