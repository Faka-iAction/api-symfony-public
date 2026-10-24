<?php

namespace App\Block\Audit;

use App\Entity\AuditLog;
use App\Logging\CorrelationContext;
use App\Privacy\SensitiveDataPolicy;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Records privileged and security-relevant changes in the append-only audit log (TIS 10.6;
 * architecture 27 and 62.11; domain model 10.9).
 *
 * record() only persists: the caller's flush writes the entry in the same transaction as
 * the change, so a change that is rolled back leaves no entry. recordNow() is for a caller
 * with no transaction of its own (a console command's summary).
 *
 * Only the fields that changed go in, before and after, and never a secret, code, token,
 * hash or contact detail (SensitiveDataPolicy, enforced here). Sign-in successes and
 * failures and code requests are not audit entries; they are logged.
 *
 * There is no update or delete here or anywhere: see App\Entity\AuditLog.
 */
final readonly class AuditLogBlock
{
    // Identity and access.
    public const IDENTIFIER_ADDED = 'IDENTIFIER_ADDED';
    public const IDENTIFIER_REMOVED = 'IDENTIFIER_REMOVED';
    public const PASSWORD_SET = 'PASSWORD_SET';
    public const SESSIONS_REVOKED = 'SESSIONS_REVOKED';
    // Creator profiles.
    public const CREATOR_PROFILE_CREATED = 'CREATOR_PROFILE_CREATED';
    public const CREATOR_PROFILE_UPDATED = 'CREATOR_PROFILE_UPDATED';
    public const CREATOR_HANDLE_CHANGED = 'CREATOR_HANDLE_CHANGED';
    // Creator Actions, the creator's own transitions.
    public const CREATOR_ACTION_PUBLISHED = 'CREATOR_ACTION_PUBLISHED';
    public const CREATOR_ACTION_PAUSED = 'CREATOR_ACTION_PAUSED';
    public const CREATOR_ACTION_RESUMED = 'CREATOR_ACTION_RESUMED';
    public const CREATOR_ACTION_DISABLED = 'CREATOR_ACTION_DISABLED';
    // The creator's decisions on participant Actions.
    public const ACTION_ACCEPTED = 'ACTION_ACCEPTED';
    public const ACTION_REJECTED = 'ACTION_REJECTED';
    public const ACTION_FULFILLED = 'ACTION_FULFILLED';
    // Guest sessions: a member's explicit confirmation that a guest session's Actions are theirs.
    public const GUEST_SESSION_CONVERTED = 'GUEST_SESSION_CONVERTED';
    // QR resources.
    public const QR_RESOURCE_SUSPENDED = 'QR_RESOURCE_SUSPENDED';
    public const QR_RESOURCE_REVOKED = 'QR_RESOURCE_REVOKED';
    public const QR_RESOURCE_REPLACED = 'QR_RESOURCE_REPLACED';
    // Commands that change data.
    public const ACTION_DEADLINES_PROCESSED = 'ACTION_DEADLINES_PROCESSED';
    public const IDENTITY_RECORDS_PURGED = 'IDENTITY_RECORDS_PURGED';
    public const OUTBOX_EVENT_REQUEUED = 'OUTBOX_EVENT_REQUEUED';
    // Country configuration.
    public const COUNTRY_CONFIGURATION_UPDATED = 'COUNTRY_CONFIGURATION_UPDATED';
    // Administration: roles (by console command only) and privileged reads.
    public const ADMIN_ROLE_GRANTED = 'ADMIN_ROLE_GRANTED';
    public const ADMIN_ROLE_REVOKED = 'ADMIN_ROLE_REVOKED';
    /** An admin read the audit log: the filters are recorded, never the results. */
    public const AUDIT_LOG_VIEWED = 'AUDIT_LOG_VIEWED';
    // Trust and safety (architecture 28).
    public const REPORT_FILED = 'REPORT_FILED';
    public const MODERATION_REVIEW_STARTED = 'MODERATION_REVIEW_STARTED';
    public const MODERATION_CASE_DISMISSED = 'MODERATION_CASE_DISMISSED';
    public const MODERATION_CASE_ESCALATED = 'MODERATION_CASE_ESCALATED';
    public const MODERATION_CASE_RESOLVED = 'MODERATION_CASE_RESOLVED';
    public const CREATOR_PROFILE_SUSPENDED = 'CREATOR_PROFILE_SUSPENDED';
    public const ACTION_MESSAGE_HIDDEN = 'ACTION_MESSAGE_HIDDEN';
    // Payments (milestone M4).
    /** A provider notification disagreed with the payment it names and was set aside. */
    public const PAYMENT_NOTIFICATION_QUARANTINED = 'PAYMENT_NOTIFICATION_QUARANTINED';
    /** An automatic refund could not be completed, or its outcome is unknown: an operator follows up. */
    public const PAYMENT_REFUND_NEEDS_ATTENTION = 'PAYMENT_REFUND_NEEDS_ATTENTION';
    /** A run of app:payments:reconcile, with what it compared and found. */
    public const PAYMENTS_RECONCILED = 'PAYMENTS_RECONCILED';
    /** A run of app:payments:process that changed anything. */
    public const PAYMENTS_PROCESSED = 'PAYMENTS_PROCESSED';
    // Cash in person: the owning creator's attestations (architecture 12.5.3.1, criteria 6 and 8).
    public const CASH_RECEIPT_CONFIRMED = 'CASH_RECEIPT_CONFIRMED';
    public const CASH_RECEIPT_VOIDED = 'CASH_RECEIPT_VOIDED';
    public const CASH_RECEIPT_CORRECTED = 'CASH_RECEIPT_CORRECTED';

    /** Settlement and payouts (decision 26). No entry carries an account number, bank code, recipient code or document. */
    public const SETTLEMENT_DETAILS_SUBMITTED = 'SETTLEMENT_DETAILS_SUBMITTED';
    public const SETTLEMENT_DESTINATION_CHANGED = 'SETTLEMENT_DESTINATION_CHANGED';
    public const SETTLEMENT_DETAILS_REFUSED = 'SETTLEMENT_DETAILS_REFUSED';
    public const SETTLEMENT_REVIEW_APPROVED = 'SETTLEMENT_REVIEW_APPROVED';
    public const SETTLEMENT_REVIEW_REJECTED = 'SETTLEMENT_REVIEW_REJECTED';
    /** The legal gate refused a provider call with a live key (decision 26). */
    public const PAYOUT_BLOCKED_BY_LEGAL_GATE = 'PAYOUT_BLOCKED_BY_LEGAL_GATE';
    public const PAYOUT_RUN_COMPLETED = 'PAYOUT_RUN_COMPLETED';
    public const PAYOUT_NEEDS_ATTENTION = 'PAYOUT_NEEDS_ATTENTION';
    public const PAYOUT_VERIFICATION_RETRIED = 'PAYOUT_VERIFICATION_RETRIED';
    public const PAYOUTS_PROCESSED = 'PAYOUTS_PROCESSED';
    /** An operator resolved a reconciliation exception; the note is the reason. */
    public const RECONCILIATION_EXCEPTION_RESOLVED = 'RECONCILIATION_EXCEPTION_RESOLVED';
    /** Support answered a ticket or changed its state; never the message text. */
    public const SUPPORT_TICKET_ANSWERED = 'SUPPORT_TICKET_ANSWERED';
    public const SUPPORT_TICKET_STATUS_CHANGED = 'SUPPORT_TICKET_STATUS_CHANGED';
    /** An administrator blocked or unblocked a member's account (ADR-039); the reason is the audit reason. */
    public const MEMBER_BLOCKED = 'MEMBER_BLOCKED';
    public const MEMBER_UNBLOCKED = 'MEMBER_UNBLOCKED';
    /** An operator changed a payment gateway account (ADR-040); never a secret key's value. */
    public const PAYMENT_GATEWAY_CHANGED = 'PAYMENT_GATEWAY_CHANGED';
    /** An operator overrode a platform setting or removed the override. */
    public const PLATFORM_SETTING_CHANGED = 'PLATFORM_SETTING_CHANGED';

    public const TARGET_MEMBER = 'Member';
    public const TARGET_MEMBER_IDENTIFIER = 'MemberIdentifier';
    public const TARGET_CREATOR_PROFILE = 'CreatorProfile';
    public const TARGET_CREATOR_ACTION = 'CreatorAction';
    public const TARGET_ACTION = 'Action';
    public const TARGET_GUEST_SESSION = 'GuestSession';
    public const TARGET_QR_RESOURCE = 'QrResource';
    public const TARGET_OUTBOX_EVENT = 'OutboxEvent';
    /** A country, by its ISO 3166-1 alpha-2 code. */
    public const TARGET_COUNTRY = 'Country';
    /** A command's run over many records; there is no single public ID. */
    public const TARGET_RECORDS = 'Records';
    /** The audit log itself, when it is read. */
    public const TARGET_AUDIT_LOG = 'AuditLog';
    public const TARGET_REPORT = 'Report';
    public const TARGET_MODERATION_CASE = 'ModerationCase';
    public const TARGET_ACTION_MESSAGE = 'ActionMessage';
    public const TARGET_PAYMENT = 'Payment';
    public const TARGET_CASH_RECEIPT = 'CashReceipt';
    /** A stored provider notification; it has no public ID, so none is recorded. */
    public const TARGET_PROVIDER_NOTIFICATION = 'ProviderNotification';
    public const TARGET_SETTLEMENT_PROFILE = 'SettlementProfile';
    public const TARGET_PAYOUT = 'Payout';
    public const TARGET_PAYOUT_RUN = 'PayoutRun';
    public const TARGET_RECONCILIATION_EXCEPTION = 'ReconciliationException';
    public const TARGET_SUPPORT_TICKET = 'SupportTicket';
    /** A gateway account, named provider/country (paystack/ZA). */
    public const TARGET_PAYMENT_GATEWAY = 'PaymentGateway';
    /** A platform setting, by its name. */
    public const TARGET_PLATFORM_SETTING = 'PlatformSetting';

    public function __construct(
        private EntityManagerInterface $entityManager,
        private CorrelationContext $correlation,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<string, mixed> $before the changed fields as they were (empty for a creation)
     * @param array<string, mixed> $after  the changed fields as they are now (empty for a removal)
     * @param string|null          $reason a reason code or an operator's reason; never personal data
     *
     * @throws \LogicException when a field would carry something sensitive
     */
    public function record(AuditActor $actor, string $action, string $targetType, ?string $targetPublicId, array $before = [], array $after = [], ?string $reason = null): AuditLog
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * record() and an immediate flush, for a caller outside any transaction of its own.
     *
     * @param array<string, mixed> $before
     * @param array<string, mixed> $after
     */
    public function recordNow(AuditActor $actor, string $action, string $targetType, ?string $targetPublicId, array $before = [], array $after = [], ?string $reason = null): AuditLog
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
