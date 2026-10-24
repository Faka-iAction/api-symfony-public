<?php

namespace App\Block\Settlement;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Payout\PayoutBlock;
use App\Block\Payout\PayoutSettings;
use App\Entity\Member;
use App\Entity\SettlementProfile;
use App\Identity\SecretFactory;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Payment\Provider\BankAccountValidation;
use App\Payment\Provider\BankRecipient;
use App\Payment\Provider\PayoutProvider;
use App\Payment\Provider\PayoutsNotApproved;
use App\Payment\Provider\ProviderNotConfigured;
use App\Payment\Provider\ProviderRejected;
use App\Payment\Provider\ProviderUnavailable;
use App\Repository\CreatorProfileRepository;
use App\Repository\SettlementProfileRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;

/**
 * The member's Settlement Profile (architecture 62.3 and 62.4; decisions 26 and 27):
 * collecting and verifying payout details, and the operator's manual review.
 *
 * Giving details (submitBankAccount): a South African bank account (bank code, account
 * number, account holder's name). Paystack's Resolve Account Number is not offered for South
 * Africa; its Validate Account is, against the owner's identity or registration number, and
 * is used when SETTLEMENT_ACCOUNT_VALIDATION is on and the creator gives the document. A
 * verified account is PAYOUT_ENABLED at once; otherwise the profile is VERIFICATION_PENDING
 * until an operator reviews it (approveReview(), rejectReview()). In both cases a Paystack
 * transfer recipient is created, and only its code, the bank's name, the last four digits
 * and the holder's name are kept. The account number and document number are never stored,
 * logged, evented or audited.
 *
 * Every submission needs a recent sign-in. A submission that replaces an earlier destination
 * puts payouts on hold for SETTLEMENT_CHANGE_HOLD_SECONDS, and is audited and evented. The
 * same details submitted again (the provider answers with the same recipient) change nothing.
 *
 * Mobile money / e-wallet (decision 27) is not offered: PayoutProvider::supportedRails() has
 * no MOBILE_MONEY rail for South Africa (see PayoutProvider::RAIL_MOBILE_MONEY).
 */
final readonly class SettlementProfileBlock
{

    public function __construct(
        private SettlementProfileRepository $profiles,
        private PayoutBlock $payouts,
        private CreatorProfileRepository $creatorProfiles,
        private PayoutProvider $provider,
        private PayoutSettings $settings,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private SecretFactory $secrets,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** How recent a sign-in must be to give or change payout details, in seconds. */
    public function stepUpMaxAge(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function find(Member $member): ?SettlementProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param int|null $signInAgeSeconds how long ago the caller signed in; null when unknown
     *
     * @throws SettlementException
     */
    public function submitBankAccount(Member $member, BankAccountInput $input, ?int $signInAgeSeconds, AuditActor $actor): SettlementProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An operator reviewed a destination waiting for verification and found it in order.
     *
     * @throws SettlementException NOT_FOUND
     */
    public function approveReview(string $profileId, AuditActor $admin, string $reason): SettlementProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An operator could not verify the destination: it is dropped and the member gives a new one.
     *
     * @throws SettlementException NOT_FOUND
     */
    public function rejectReview(string $profileId, AuditActor $admin, string $reason): SettlementProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<SettlementProfile>
     */
    public function awaitingReview(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Audits a refused submission. Called by the entry point after the submission's own
     * transaction (the idempotency transaction) has been rolled back, so that the entry stays.
     * The legal gate's refusal is audited as PAYOUT_BLOCKED_BY_LEGAL_GATE.
     */
    public function auditRefusal(Member $member, SettlementException $refused, AuditActor $actor): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
