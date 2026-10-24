<?php

namespace App\Controller\Web;

use App\Action\ActionDefaults;
use App\Action\ActionState;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\CreatorActionBlock;
use App\Block\Action\IncomingActionBlock;
use App\Block\Payment\CashBlock;
use App\Web\ReturnPath;
use Psr\Clock\ClockInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The creator's queue, the Activity tab (architecture 4.4): what participants sent, oldest
 * first, with accept, reject and mark fulfilled. The same Block as the API's
 * /me/incoming-actions operations, which also decides what the creator may see of a
 * participant: member or guest, and a member's display name, never a contact detail.
 *
 * Decisions are not forced into any order (decision 2): a bid shows its current place and its
 * total, and the creator may answer bids in any order. Cash reported for the creator to
 * confirm is linked from here to its confirmation page (CashReceiptController). A decision that lost a race (the item
 * was answered on another device, or its deadline passed) is the Block's state conflict,
 * shown as a plain message on the queue, never an error page.
 */
final class QueueController extends CreatorAreaController
{

    public function __construct(
        private readonly IncomingActionBlock $incoming,
        private readonly CreatorActionBlock $creatorActions,
        private readonly CashBlock $cash,
        private readonly ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/activity', name: 'web_creator_activity', methods: [Request::METHOD_GET])]
    public function list(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/activity/{actionId}/{decision}', name: 'web_creator_activity_decide', requirements: ['actionId' => '[^/]+', 'decision' => 'accept|reject|fulfil'], methods: [Request::METHOD_POST])]
    public function decide(string $actionId, string $decision, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
