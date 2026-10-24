<?php

namespace App\Block\Action;

use App\Action\ActionConfig;
use App\Action\ActionDefaults;
use App\Action\ActionState;
use App\Action\ActionType;
use App\Action\Money;
use App\Action\Screening\MessageScreener;
use App\Block\Country\ActionPolicy;
use App\Block\Country\CountryBlock;
use App\Entity\ActionBid;
use App\Entity\ActionMessage;
use App\Entity\ActionOption;
use App\Entity\ActionRequest;
use App\Entity\ActionVote;
use App\Entity\CreatorAction;
use App\Entity\CreatorActionConfig;
use App\Entity\ParticipantAction;
use App\Entity\PlaylistItem;
use App\Identity\SecretFactory;
use App\Payment\Provider\PaymentProvider;
use App\Repository\ActionBidRepository;
use App\Repository\ActionOptionRepository;
use App\Repository\CreatorActionConfigRepository;
use App\Repository\CreatorActionRepository;
use App\Repository\ParticipantActionRepository;
use App\Repository\PlaylistItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Submitting a Request, a Vote, a Bid, a Shout-out or a Tip (state-machines.md sections 4 to 8), by
 * a member or a guest.
 *
 * Paid participation (milestone M4): a submission to a paid Creator Action is stored as
 * CREATED with the amount due, computed here by the server: the configured price of a
 * Request or Shout-out, or the participant's tip amount once it is validated against the
 * Creator Action's minimum and maximum and the country's maximum amount. It does not count
 * until its payment is confirmed (PaymentBlock, PaymentConfirmation). With no payment
 * provider configured a paid submission is refused with PAYMENT_PROVIDER_UNAVAILABLE before
 * anything is stored (fail closed).
 *
 * Every check is made before anything is written. A free Action is stored as CREATED and
 * moves to SUBMITTED in the same transaction; where the creator's approval is not required
 * it is ACCEPTED at once. Each transition is in the state history and writes its event
 * (ActionCreated, ActionSubmitted, ActionAccepted) to the outbox in the same transaction,
 * after every check has passed under the lock.
 *
 * Concurrency: the checks that another request can invalidate (state, window,
 * configuration version, the option's availability, the quantity limit, the votes per
 * participant and the duplicate rule) are made again inside the transaction that inserts
 * the Action, under the Creator Action's row lock and with locking reads, so two
 * submissions at the same moment cannot both take a place only one of them may have.
 * None of these rules is a database constraint: the quantity is a count, the votes per
 * participant are configurable (up to ActionDefaults::POLICY_MAX_VOTES_PER_PARTICIPANT),
 * and the duplicate rule depends on the configuration version and on which Actions are
 * still open.
 */
final readonly class ParticipationBlock
{
    public function __construct(
        private CreatorActionRepository $creatorActions,
        private CreatorActionConfigRepository $configs,
        private ActionOptionRepository $options,
        private PlaylistItemRepository $items,
        private ParticipantActionRepository $participants,
        private CreatorActionBlock $creatorActionBlock,
        private ActionHistory $history,
        private MessageScreener $screener,
        private ParticipantViewLoader $views,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private ActionTransaction $transactions,
        private CountryBlock $countries,
        private PaymentProvider $paymentProvider,
        private ActionBidRepository $bids,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_NOT_OPEN, GUEST_NOT_ALLOWED,
     *                         ACTION_CONFIG_CHANGED, PAYMENT_PROVIDER_UNAVAILABLE, INVALID_INPUT,
     *                         OPTION_UNAVAILABLE or PARTICIPATION_LIMIT_REACHED
     */
    public function submitRequest(Participant $participant, string $creatorActionId, int $configVersion, string $optionId, ?string $note, ?string $customFieldValue, string $idempotencyKey): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A vote counts at once and cannot be changed or withdrawn (decision 9).
     *
     * @throws ActionException CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_NOT_OPEN, GUEST_NOT_ALLOWED,
     *                         ACTION_CONFIG_CHANGED, INVALID_INPUT, OPTION_UNAVAILABLE or PARTICIPATION_LIMIT_REACHED
     */
    public function submitVote(Participant $participant, string $creatorActionId, int $configVersion, string $optionId, string $idempotencyKey): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The message is screened before it is stored (decision 22): one that fails is refused
     * with NOT_ALLOWED on `message` and nothing is created. The creator reviews it after.
     *
     * @throws ActionException CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_NOT_OPEN, GUEST_NOT_ALLOWED,
     *                         ACTION_CONFIG_CHANGED, PAYMENT_PROVIDER_UNAVAILABLE, INVALID_INPUT or
     *                         PARTICIPATION_LIMIT_REACHED
     */
    public function submitShoutOut(Participant $participant, string $creatorActionId, int $configVersion, string $message, ?string $customFieldValue, string $idempotencyKey): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A Tip (architecture 7.7): the participant chooses the amount, and the server validates
     * it against the Creator Action's currency, minimum and maximum (BELOW_MINIMUM,
     * ABOVE_MAXIMUM, CURRENCY_MISMATCH on `amount`) and then the country's maximum amount, a
     * platform transaction limit that is not disclosed (TRANSACTION_LIMIT_EXCEEDED). The
     * optional message is allowed only where the Creator Action enables one, and is screened
     * as a Shout-out's is. The Tip is stored CREATED and completes when its payment is
     * confirmed; it has no fulfilment step and no fulfilment deadline.
     *
     * @throws ActionException CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_NOT_OPEN, GUEST_NOT_ALLOWED,
     *                         ACTION_CONFIG_CHANGED, PAYMENT_PROVIDER_UNAVAILABLE, INVALID_INPUT,
     *                         TRANSACTION_LIMIT_EXCEEDED or PARTICIPATION_LIMIT_REACHED
     */
    public function submitTip(Participant $participant, string $creatorActionId, int $configVersion, Money $amount, ?string $message, string $idempotencyKey): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A Bid (architecture 7.4 and 7.4.1; decision 1; TIS 8.2.1). The participant chooses the
     * amount, and the server checks it: in the Creator Action's currency (CURRENCY_MISMATCH),
     * at least the minimum bid (BELOW_MINIMUM) and the minimum plus a whole number of
     * increments (NOT_IN_INCREMENT), all on `amount`. It does not have to beat the highest bid.
     * Then the country's limits (TRANSACTION_LIMIT_EXCEEDED) and, under the Creator Action's
     * lock, the quantity limit and the maximum bids per participant
     * (PARTICIPATION_LIMIT_REACHED).
     *
     * The bid is stored CREATED with its ranking row (total zero, not ranked) and the time the
     * participant acknowledged the bid terms (charged now; being outbid lowers the position);
     * the caller has checked that acknowledgement. It counts, and is ranked,
     * only when its payment is confirmed (PaymentConfirmation, BidRankingBlock). It can never
     * be paid in cash (decision 3).
     *
     * @throws ActionException CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_NOT_OPEN, GUEST_NOT_ALLOWED,
     *                         ACTION_CONFIG_CHANGED, PAYMENT_PROVIDER_UNAVAILABLE, INVALID_INPUT,
     *                         TRANSACTION_LIMIT_EXCEEDED or PARTICIPATION_LIMIT_REACHED
     */
    public function submitBid(Participant $participant, string $creatorActionId, int $configVersion, Money $amount, ?string $customFieldValue, string $idempotencyKey): ParticipantView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The platform limits on a raise of the bid (the increase is a payment of its own): the
     * country's maximum amount and currencies now, and what the provider collects.
     *
     * @throws ActionException TRANSACTION_LIMIT_EXCEEDED or PAYMENT_PROVIDER_UNAVAILABLE
     */
    public function checkRaisePayable(ParticipantAction $action, Money $increase): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Checks a bid amount, or the increase of a raise, against the Creator Action's bid
     * steps (decision 1): in its currency, at least $minimum (the minimum bid, or one
     * increment for a raise), and $minimum plus a whole number of increments.
     *
     * @return array{string, string}|null the field and its code, or null when the amount is valid
     */
    public static function bidAmountError(ActionConfig $config, Money $amount, ?Money $minimum): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Platform limits on what may be charged, whatever the Creator Action says: the country's
     * maximum amount and currencies (the country may have tightened them since the Creator
     * Action was configured), and what the payment provider collects.
     *
     * @throws ActionException TRANSACTION_LIMIT_EXCEEDED or PAYMENT_PROVIDER_UNAVAILABLE
     */
    public function checkPayable(Money $amount, ActionPolicy $policy): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Decision 24: a free Action's deadline follows the same rule as a paid one's. For a
     * free Action, "after payment" is read as after submission.
     */
    public static function deadline(CreatorAction $action, ActionConfig $config, \DateTimeImmutable $submittedAt): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
