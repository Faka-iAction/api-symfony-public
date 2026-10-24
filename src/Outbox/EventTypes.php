<?php

namespace App\Outbox;

/**
 * The event and aggregate names this backend emits, as listed in the contracts'
 * events/README.md ("MVP1 events"). Every name there is still a proposal for review; the
 * ones marked (P) depend on a proposed state transition, and QR_RESOURCE_REPLACED is not
 * in the list at all (see the comment on it).
 */
final class EventTypes
{
    public const AGGREGATE_MEMBER = 'Member';
    public const AGGREGATE_CREATOR_PROFILE = 'CreatorProfile';
    /** A follow has no public ID of its own; see Outbox::followId(). */
    public const AGGREGATE_CREATOR_FOLLOW = 'CreatorFollow';
    public const AGGREGATE_QR_RESOURCE = 'QrResource';
    public const AGGREGATE_CREATOR_ACTION = 'CreatorAction';
    /** A participant Action (events/README.md: "Action is a participant Action"). */
    public const AGGREGATE_ACTION = 'Action';
    public const AGGREGATE_GUEST_SESSION = 'GuestSession';

    public const MEMBER_REGISTERED = 'MemberRegistered';
    /** An administrator blocked or unblocked a member's account (ADR-039). */
    public const MEMBER_BLOCKED = 'MemberBlocked';
    public const MEMBER_UNBLOCKED = 'MemberUnblocked';
    public const MEMBER_IDENTIFIER_ADDED = 'MemberIdentifierAdded';
    public const MEMBER_IDENTIFIER_REMOVED = 'MemberIdentifierRemoved';

    public const CREATOR_PROFILE_CREATED = 'CreatorProfileCreated';
    public const CREATOR_PROFILE_UPDATED = 'CreatorProfileUpdated';
    public const CREATOR_HANDLE_CHANGED = 'CreatorHandleChanged';

    public const CREATOR_FOLLOWED = 'CreatorFollowed';
    public const CREATOR_UNFOLLOWED = 'CreatorUnfollowed';

    public const QR_RESOURCE_CREATED = 'QrResourceCreated';
    public const QR_RESOURCE_ACTIVATED = 'QrResourceActivated';
    public const QR_RESOURCE_SUSPENDED = 'QrResourceSuspended';
    public const QR_RESOURCE_REVOKED = 'QrResourceRevoked';
    /**
     * NOT in events/README.md: a proposal of this backend. The README has
     * QrResourceRetargeted, but an ordinary replacement does not change the target; it
     * moves the code to REPLACED (state-machines.md 14), which no listed name covers.
     */
    public const QR_RESOURCE_REPLACED = 'QrResourceReplaced';

    public const CREATOR_ACTION_CREATED = 'CreatorActionCreated';
    public const CREATOR_ACTION_CONFIG_CHANGED = 'CreatorActionConfigChanged';
    public const CREATOR_ACTION_PUBLISHED = 'CreatorActionPublished';
    /** Also on resume, and on reopening an expired one by moving its end time (P, DN-02). */
    public const CREATOR_ACTION_ACTIVATED = 'CreatorActionActivated';
    public const CREATOR_ACTION_PAUSED = 'CreatorActionPaused';
    public const CREATOR_ACTION_EXPIRED = 'CreatorActionExpired';
    public const CREATOR_ACTION_DISABLED = 'CreatorActionDisabled';

    public const ACTION_CREATED = 'ActionCreated';
    public const ACTION_INITIATED = 'ActionInitiated';
    public const ACTION_SUBMITTED = 'ActionSubmitted';
    public const ACTION_ACCEPTED = 'ActionAccepted';
    public const ACTION_REJECTED = 'ActionRejected';
    public const ACTION_FULFILLED = 'ActionFulfilled';
    /** (P, DN-06 and DN-47): emitted when voting closes and a vote completes. */
    public const ACTION_COMPLETED = 'ActionCompleted';
    public const ACTION_CANCELLED = 'ActionCancelled';
    public const ACTION_EXPIRED = 'ActionExpired';
    /** (P, DN-07): no path reaches FAILED yet. */
    public const ACTION_FAILED = 'ActionFailed';

    /**
     * Bids (events/README.md): on the `Action` aggregate. BidRanked when a bid's first payment
     * is confirmed and it enters the ranking; BidRaised when a raise payment is confirmed;
     * BidRankChanged once for every other ranked bid whose rank moved. Outbidding emits
     * BidRankChanged only.
     */
    public const BID_RANKED = 'BidRanked';
    public const BID_RAISED = 'BidRaised';
    public const BID_RANK_CHANGED = 'BidRankChanged';

    /**
     * Cash in person (events/README.md): on the `CashReceipt` aggregate. A cash receipt never
     * causes a payment, settlement or referral event.
     */
    public const AGGREGATE_CASH_RECEIPT = 'CashReceipt';
    public const CASH_RECEIPT_REPORTED = 'CashReceiptReported';
    public const CASH_RECEIPT_CONFIRMED = 'CashReceiptConfirmed';
    /** (P, DN-27) */
    public const CASH_RECEIPT_VOIDED = 'CashReceiptVoided';
    public const CASH_RECEIPT_CORRECTED = 'CashReceiptCorrected';

    public const GUEST_SESSION_CREATED = 'GuestSessionCreated';
    /**
     * NOT in events/README.md: a proposal of this backend. A member explicitly confirmed a
     * guest session's Actions as theirs (architecture 5.2; GuestSessionBlock::convert()).
     */
    public const GUEST_SESSION_CONVERTED = 'GuestSessionConverted';

    /** A country, identified by its ISO 3166-1 alpha-2 code. */
    public const AGGREGATE_COUNTRY = 'Country';
    /**
     * A PROPOSAL: events/README.md lists CountryConfigurationUpdated only as a placeholder,
     * outside the API contract, with no aggregate or payload. This backend emits it on the
     * `Country` aggregate when a configuration value is added (CountryConfigurationBlock).
     */
    public const COUNTRY_CONFIGURATION_UPDATED = 'CountryConfigurationUpdated';

    /**
     * PROPOSALS, NOT in events/README.md: administration and trust and safety. The README
     * names "member capability changed" among the representative events (architecture 23.2)
     * but nothing for admin roles, reports or moderation.
     *
     * An admin role granted to or revoked from a member, on the Member aggregate.
     */
    public const ADMIN_ROLE_GRANTED = 'AdminRoleGranted';
    public const ADMIN_ROLE_REVOKED = 'AdminRoleRevoked';
    /** A report filed by a member or a guest (architecture 28), on its own aggregate. */
    public const AGGREGATE_REPORT = 'Report';
    public const REPORT_FILED = 'ReportFiled';
    /** A decision in a moderation case: review started, dismissed, escalated or an enforcement. */
    public const AGGREGATE_MODERATION_CASE = 'ModerationCase';
    public const MODERATION_ACTION_TAKEN = 'ModerationActionTaken';
    /** A creator profile taken out of public view by moderation. */
    public const CREATOR_PROFILE_SUSPENDED = 'CreatorProfileSuspended';
    /** A Shout-out message hidden from public view by moderation (state-machines.md DN-21). */
    public const AGGREGATE_ACTION_MESSAGE = 'ActionMessage';
    public const ACTION_MESSAGE_HIDDEN = 'ActionMessageHidden';

    /**
     * PROPOSALS, NOT in events/README.md: payments (milestone M4). An online payment is its
     * own aggregate; its events are named after the state it moves to, as an Action's are.
     * The payload names the payment's Action and states only: never a provider reference,
     * an amount the payer did not see, or anything of the payer.
     */
    public const AGGREGATE_PAYMENT = 'Payment';
    public const PAYMENT_PENDING = 'PaymentPending';
    public const PAYMENT_CONFIRMED = 'PaymentConfirmed';
    public const PAYMENT_FAILED = 'PaymentFailed';
    public const PAYMENT_EXPIRED = 'PaymentExpired';
    public const PAYMENT_REFUNDED = 'PaymentRefunded';
    public const PAYMENT_DISPUTED = 'PaymentDisputed';
    public const PAYMENT_REVERSED = 'PaymentReversed';
    /** An automatic full refund was asked for; a worker sends it to the provider. */
    public const PAYMENT_REFUND_REQUESTED = 'PaymentRefundRequested';

    /**
     * Settlement Profile (events/README.md lists these names; payloads proposed by this
     * backend in contract 1.0.0-alpha.3). The payload names the profile, its member and its
     * states only: never the account number, the bank code, the recipient code, the holder's
     * name or any identity document.
     */
    public const AGGREGATE_SETTLEMENT_PROFILE = 'SettlementProfile';
    public const SETTLEMENT_PROFILE_CREATED = 'SettlementProfileCreated';
    public const SETTLEMENT_PROFILE_VERIFICATION_STARTED = 'SettlementProfileVerificationStarted';
    public const SETTLEMENT_PROFILE_PAYOUT_ENABLED = 'SettlementProfilePayoutEnabled';
    public const SETTLEMENT_PROFILE_VERIFICATION_FAILED = 'SettlementProfileVerificationFailed';
    public const SETTLEMENT_PROFILE_DESTINATION_CHANGED = 'SettlementProfileDestinationChanged';

    /**
     * PROPOSALS added in contract 1.0.0-alpha.3: payouts (decision 26), on the `Payout`
     * aggregate, named after the payout state they move to. The payload names the payout, its
     * creator, its amount and its states; never a provider reference or destination detail.
     */
    public const AGGREGATE_PAYOUT = 'Payout';
    public const PAYOUT_CREATED = 'PayoutCreated';
    public const PAYOUT_PROCESSING = 'PayoutProcessing';
    public const PAYOUT_PAID = 'PayoutPaid';
    public const PAYOUT_FAILED = 'PayoutFailed';
    public const PAYOUT_REVERSED = 'PayoutReversed';

    /** The event a payment's move to each state emits. */
    public const PAYMENT_STATE_EVENTS = [
        'PENDING' => self::PAYMENT_PENDING,
        'CONFIRMED' => self::PAYMENT_CONFIRMED,
        'FAILED' => self::PAYMENT_FAILED,
        'EXPIRED' => self::PAYMENT_EXPIRED,
        'REFUNDED' => self::PAYMENT_REFUNDED,
        'DISPUTED' => self::PAYMENT_DISPUTED,
        'REVERSED' => self::PAYMENT_REVERSED,
    ];

    /** The event a Creator Action's move to each state emits. */
    public const CREATOR_ACTION_STATE_EVENTS = [
        'PUBLISHED' => self::CREATOR_ACTION_PUBLISHED,
        'ACTIVE' => self::CREATOR_ACTION_ACTIVATED,
        'PAUSED' => self::CREATOR_ACTION_PAUSED,
        'EXPIRED' => self::CREATOR_ACTION_EXPIRED,
        'DISABLED' => self::CREATOR_ACTION_DISABLED,
    ];

    /** The event a participant Action's move to each state emits. */
    public const ACTION_STATE_EVENTS = [
        'CREATED' => self::ACTION_CREATED,
        'INITIATED' => self::ACTION_INITIATED,
        'SUBMITTED' => self::ACTION_SUBMITTED,
        'ACCEPTED' => self::ACTION_ACCEPTED,
        'REJECTED' => self::ACTION_REJECTED,
        'FULFILLED' => self::ACTION_FULFILLED,
        'COMPLETED' => self::ACTION_COMPLETED,
        'CANCELLED' => self::ACTION_CANCELLED,
        'EXPIRED' => self::ACTION_EXPIRED,
        'FAILED' => self::ACTION_FAILED,
    ];
}
