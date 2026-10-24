<?php

namespace App\Block\Payment;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Action\Money;
use App\Block\Action\ActionDeadlineBlock;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\ActionHistory;
use App\Block\Action\ActionTransaction;
use App\Block\Action\Actor;
use App\Block\Action\BidRankingBlock;
use App\Block\Action\Participant;
use App\Block\Action\ParticipationBlock;
use App\Entity\ParticipantAction;
use App\Entity\Payment;
use App\Entity\PaymentRefund;
use App\Identity\SecretFactory;
use App\Payment\PaymentState;
use App\Payment\Provider\CheckoutRequest;
use App\Payment\Provider\CheckoutSession;
use App\Payment\Provider\PaymentProvider;
use App\Payment\Provider\ProviderException;
use App\Payment\Provider\ProviderNotConfigured;
use App\Payment\Provider\ProviderUnavailable;
use App\Repository\ActionBidRepository;
use App\Repository\CashReceiptRepository;
use App\Repository\ParticipantActionRepository;
use App\Repository\PaymentRefundRepository;
use App\Repository\PaymentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;

/**
 * The participant's payments: the methods for an Action (listActionPaymentMethods), starting
 * a payment (createPayment), raising a bid (raiseBid), reading one (getPayment) and its
 * receipt (getPaymentReceipt).
 *
 * The amount is the Action's, computed by the server when the Action was submitted (the
 * price, or the tip or bid amount validated then); the request names only the method. A
 * raise is the one payment whose amount the participant chooses: the increase, validated here
 * against the bid's increments. A payment never changes state here except by asking the
 * provider (PaymentConfirmation).
 */
final readonly class PaymentBlock
{
    /** The online methods this backend offers, by code, with the name a client shows. */
    public const ONLINE_METHODS = [PaymentState::METHOD_CARD => 'Card'];

    public function __construct(
        private PaymentProvider $provider,
        private PaymentRepository $payments,
        private PaymentRefundRepository $refunds,
        private ParticipantActionRepository $participants,
        private PaymentStateMachine $states,
        private PaymentConfirmation $confirmation,
        private ActionHistory $history,
        private ActionTransaction $transactions,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private PaymentSettings $settings,
        private ClockInterface $clock,
        private LoggerInterface $logger,
        private ActionBidRepository $bids,
        private ActionDeadlineBlock $deadlines,
        private ParticipationBlock $participation,
        private CashBlock $cash,
        private CashReceiptRepository $cashReceipts,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function paymentsAvailable(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The online methods offered for a paid Action now: none without a provider.
     *
     * @return list<array{code: string, kind: string, displayName: string}>
     */
    public function onlineMethods(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether the Action can be paid for now: paid, not yet paid, not closed.
     */
    public static function isPayable(ParticipantAction $action): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema ActionPaymentMethods.
     *
     * @return array{actionId: string, amountDue: array{amountMinor: int, currency: string}|null, methods: list<array{code: string, kind: string, displayName: string}>}
     *
     * @throws ActionException ACTION_NOT_FOUND
     */
    public function methodsFor(Participant $participant, string $actionId): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Every method offered for the Action now: the online ones, and cash in person where the
     * Creator Action, the profile and the type allow it (never for a Bid).
     *
     * @return list<array{code: string, kind: string, displayName: string}>
     */
    public function methodsOffered(ParticipantAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Starts the online payment of a paid Action. The provider's checkout is started before
     * anything is stored, outside any row lock (it charges nothing); the payment is then
     * stored under the Action's lock, after the checks are made again. A checkout started for
     * a request that loses is never shown to anyone and expires unpaid at the provider.
     *
     * @param string $callbackUrl where the provider sends the payer back (never proof of payment)
     *
     * @throws ActionException PAYMENT_PROVIDER_UNAVAILABLE, ACTION_NOT_FOUND, ACTION_NOT_PAYABLE,
     *                         PAYMENT_METHOD_NOT_AVAILABLE or PAYMENT_ALREADY_IN_PROGRESS
     */
    public function create(Participant $participant, string $actionId, string $method, string $callbackUrl): PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Starts a raise of the caller's ranked bid (raiseBid; architecture 7.4.1): a further
     * online payment for the increase only, purpose BID_RAISE. The increase must be at least
     * one bid increment, in increment steps, in the bid's currency (BELOW_MINIMUM,
     * NOT_IN_INCREMENT, CURRENCY_MISMATCH on `amount`), under the configuration the bid was
     * made with. The raise takes effect only when this payment is CONFIRMED
     * (PaymentConfirmation); one that fails or expires changes nothing. The Action's state and
     * its fulfilment deadline do not move (DN-18).
     *
     * As create(): the checkout is started outside any lock, and the payment is stored under
     * the Action's lock after the deadline is applied and every check is made again.
     *
     * @throws ActionException PAYMENT_PROVIDER_UNAVAILABLE, ACTION_NOT_FOUND, INVALID_INPUT,
     *                         TRANSACTION_LIMIT_EXCEEDED, BID_NOT_RAISABLE,
     *                         PAYMENT_METHOD_NOT_AVAILABLE or PAYMENT_ALREADY_IN_PROGRESS
     */
    public function raise(Participant $participant, string $actionId, Money $increase, string $method, string $callbackUrl): PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One of the caller's payments. An open one whose provider was not asked recently is
     * checked with the provider first (server to server), so that polling getPayment, or the
     * status page after the payer comes back, settles it even when a notification is late.
     *
     * @throws ActionException PAYMENT_NOT_FOUND
     */
    public function get(Participant $participant, string $paymentId): PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException PAYMENT_NOT_FOUND or RECEIPT_NOT_AVAILABLE
     */
    public function receipt(Participant $participant, string $paymentId): PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The Action's payments, oldest first, each with its refund.
     *
     * @return list<PaymentView>
     */
    public function forAction(ParticipantAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Asks the provider about the Action's open payments, at most once per interval each.
     * Provider trouble is logged and changes nothing: the state stays PENDING.
     */
    public function refreshAction(ParticipantAction $action): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function view(Payment $payment): PaymentView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
