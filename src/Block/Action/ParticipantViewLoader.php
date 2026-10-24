<?php

namespace App\Block\Action;

use App\Action\ActionType;
use App\Block\Payment\PaymentView;
use App\Entity\ParticipantAction;
use App\Entity\Payment;
use App\Repository\ActionBidRepository;
use App\Repository\ActionMessageRepository;
use App\Repository\ActionRequestRepository;
use App\Repository\ActionVoteRepository;
use App\Repository\CashReceiptRepository;
use App\Repository\PaymentRefundRepository;
use App\Repository\PaymentRepository;
use Psr\Clock\ClockInterface;

/**
 * Loads what the participant and creator views of an Action show.
 */
final readonly class ParticipantViewLoader
{
    public function __construct(
        private ActionRequestRepository $requests,
        private ActionVoteRepository $votes,
        private ActionMessageRepository $messages,
        private PaymentRepository $payments,
        private PaymentRefundRepository $refunds,
        private ActionBidRepository $bids,
        private CashReceiptRepository $cashReceipts,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function view(ParticipantAction $action): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<ParticipantAction> $actions
     *
     * @return list<ParticipantView>
     */
    public function views(array $actions): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
