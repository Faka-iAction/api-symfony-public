<?php

namespace App\Moderation;

/**
 * The vocabulary of trust and safety (architecture 28; domain model 10.1 to 10.3).
 *
 * Report states are architecture 28's. Case statuses and the subject types are the domain
 * model's (proposed). The reason categories and the action types are this backend's
 * proposal: the domain model names `reason_code` without values, and proposes the action
 * types SUSPEND, RESTORE, DISABLE_ACTION, RESTRICT_CAPABILITY, REJECT_MESSAGE and NOTE,
 * which do not name the decisions available now (see the contract issues of milestone M2).
 */
final class Moderation
{
    // Report states (architecture 28).
    public const REPORTED = 'REPORTED';
    public const UNDER_REVIEW = 'UNDER_REVIEW';
    /** Defined by architecture 28; no decision available yet leads to it. */
    public const ACTION_REQUIRED = 'ACTION_REQUIRED';
    public const RESOLVED = 'RESOLVED';
    public const DISMISSED = 'DISMISSED';
    public const ESCALATED = 'ESCALATED';

    // Case statuses (domain model 10.2).
    public const CASE_OPEN = 'OPEN';
    public const CASE_IN_REVIEW = 'IN_REVIEW';
    public const CASE_CLOSED = 'CLOSED';

    // Subjects (domain model 10.1).
    public const SUBJECT_CREATOR_PROFILE = 'CREATOR_PROFILE';
    public const SUBJECT_CREATOR_ACTION = 'CREATOR_ACTION';
    public const SUBJECT_ACTION_MESSAGE = 'ACTION_MESSAGE';

    // Decisions in a case.
    public const START_REVIEW = 'START_REVIEW';
    public const DISMISS = 'DISMISS';
    public const ESCALATE = 'ESCALATE';
    public const SUSPEND_PROFILE = 'SUSPEND_PROFILE';
    public const SUSPEND_QR = 'SUSPEND_QR';
    public const REVOKE_QR = 'REVOKE_QR';
    public const HIDE_MESSAGE = 'HIDE_MESSAGE';

    /** The decisions that act on public content: each resolves the case. */
    public const ENFORCEMENTS = [self::SUSPEND_PROFILE, self::SUSPEND_QR, self::REVOKE_QR, self::HIDE_MESSAGE];

    /** Why something is reported: code => what the reporter reads. */
    public const REASONS = [
        'SPAM' => 'Spam or misleading',
        'HARASSMENT' => 'Harassment or bullying',
        'HATE' => 'Hate or discrimination',
        'SEXUAL_CONTENT' => 'Sexual content',
        'VIOLENCE' => 'Violence or threats',
        'ILLEGAL' => 'Illegal goods, services or activity',
        'FRAUD' => 'Fraud or a scam',
        'IMPERSONATION' => 'Pretending to be someone else',
        'OTHER' => 'Something else',
    ];

    public const DETAILS_MAX_LENGTH = 1000;
    public const DECISION_REASON_MAX_LENGTH = 1000;
}
