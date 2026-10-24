<?php

namespace App\Block\Action;

use App\Action\ActionConfig;
use App\Block\Payment\PaymentView;
use App\Entity\ActionBid;
use App\Entity\ActionMessage;
use App\Entity\CashReceipt;
use App\Entity\ActionRequest;
use App\Entity\ActionVote;
use App\Entity\ParticipantAction;

/**
 * A participant Action with its type-specific part and the configuration it was made under.
 */
final readonly class ParticipantView
{
    /**
     * @param list<PaymentView> $payments        the Action's online payments, oldest first
     * @param ActionBid|null    $bid             a Bid's ranking row; null for every other type
     * @param int               $rankedBidCount  how many bids are ranked on the Creator Action now (a Bid only)
     * @param bool              $canRaise        whether raiseBid would be accepted now
     * @param CashReceipt|null  $cashReceipt     the Action's cash receipt, when cash in person was chosen
     */
    public function __construct(
        public ParticipantAction $action,
        public ActionConfig $config,
        public ?ActionRequest $request,
        public ?ActionVote $vote,
        public ?ActionMessage $message,
        public array $payments = [],
        public ?ActionBid $bid = null,
        public int $rankedBidCount = 0,
        public bool $canRaise = false,
        public ?CashReceipt $cashReceipt = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The first payment: for a Bid, the payment that placed it (contract IncomingAction.paymentState). */
    public function firstPayment(): ?PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The newest payment, which says where the Action's payment stands. */
    public function latestPayment(): ?PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The open payment, if any: the one the payer can still complete. */
    public function openPayment(): ?PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The contract's ActionSelection, as it read when chosen; null for a type without one.
     *
     * @return array{optionId: string, label: string, secondaryLabel: string|null}|null
     */
    public function selection(): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
