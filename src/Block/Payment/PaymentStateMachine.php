<?php

namespace App\Block\Payment;

use App\Block\Action\Actor;
use App\Entity\Payment;
use App\Entity\StateTransition;
use App\Logging\CorrelationContext;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Every change of a payment's state goes through here (as ActionHistory for Actions): the
 * move is checked against PaymentState::TRANSITIONS, recorded in the state history with
 * actor, trigger and correlation ID, and its event is written to the outbox, all in the
 * caller's transaction. Nothing here flushes except to obtain a new payment's key.
 */
final readonly class PaymentStateMachine
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CorrelationContext $correlation,
        private Outbox $outbox,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Records the first state of a new payment (PENDING: the provider has the checkout).
     */
    public function recordCreated(Payment $payment, Actor $actor): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $trigger what moved it: a notification, a verify call, the expiry job, a refund
     *
     * @return string the ID of the event the move emitted
     */
    public function move(Payment $payment, string $to, string $trigger, ?string $failureCode = null, ?string $causationId = null): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
