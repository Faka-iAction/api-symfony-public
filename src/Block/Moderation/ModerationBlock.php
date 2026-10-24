<?php

namespace App\Block\Moderation;

use App\Action\ActionType;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Qr\QrResourceBlock;
use App\Entity\ActionMessage;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Entity\ModerationAction;
use App\Entity\ModerationCase;
use App\Entity\QrResource;
use App\Moderation\Moderation;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\ActionMessageRepository;
use App\Repository\CreatorActionRepository;
use App\Repository\CreatorProfileRepository;
use App\Repository\ModerationActionRepository;
use App\Repository\ModerationCaseRepository;
use App\Repository\QrResourceRepository;
use App\Repository\ReportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The moderation queue and the decisions a moderator can take now (architecture 28). Every
 * decision is a moderator's: nothing here runs on its own, and nothing is decided
 * automatically.
 *
 * Each decision, in one transaction under the case's row lock: the effect (through the Block
 * that owns the thing changed, where there is one), a `moderation_actions` row with the
 * moderator and the mandatory reason, the reports' new state, the audit entries and the
 * events. A refused decision writes nothing.
 *
 * - Start review: reports REPORTED to UNDER_REVIEW; the case IN_REVIEW, assigned to the moderator.
 * - Escalate: reports to ESCALATED; the case stays open, marked escalated.
 * - Dismiss: reports to DISMISSED; the case CLOSED.
 * - Enforcements, each of which resolves the case (reports RESOLVED, the case CLOSED):
 *   suspend the creator profile (it leaves public view: its page and its codes stop
 *   resolving), suspend or revoke one of the creator's QR codes (QrResourceBlock), hide a
 *   Shout-out message from public view.
 */
final readonly class ModerationBlock
{

    public function __construct(
        private ModerationCaseRepository $cases,
        private ReportRepository $reports,
        private ModerationActionRepository $decisions,
        private CreatorProfileRepository $profiles,
        private CreatorActionRepository $creatorActions,
        private ActionMessageRepository $messages,
        private QrResourceRepository $qrCodes,
        private QrResourceBlock $qrResources,
        private EntityManagerInterface $entityManager,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<array{case: ModerationCase, reports: int}> escalated first, then oldest first
     */
    public function queue(int $limit = 100): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ModerationException CASE_NOT_FOUND
     */
    public function view(string $casePublicId): ModerationCaseView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ModerationException CASE_NOT_FOUND, CASE_CLOSED or INVALID_INPUT
     */
    public function startReview(Member $moderator, string $casePublicId, string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ModerationException CASE_NOT_FOUND, CASE_CLOSED or INVALID_INPUT
     */
    public function escalate(Member $moderator, string $casePublicId, string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ModerationException CASE_NOT_FOUND, CASE_CLOSED or INVALID_INPUT
     */
    public function dismiss(Member $moderator, string $casePublicId, string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Takes the case's creator profile out of public view (CreatorProfile::suspend()).
     *
     * @throws ModerationException CASE_NOT_FOUND, CASE_CLOSED, INVALID_INPUT or NOT_APPLICABLE (already suspended)
     */
    public function suspendProfile(Member $moderator, string $casePublicId, string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ModerationException CASE_NOT_FOUND, CASE_CLOSED, INVALID_INPUT or NOT_APPLICABLE
     */
    public function suspendQr(Member $moderator, string $casePublicId, string $shortCode, string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ModerationException CASE_NOT_FOUND, CASE_CLOSED, INVALID_INPUT or NOT_APPLICABLE
     */
    public function revokeQr(Member $moderator, string $casePublicId, string $shortCode, string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Hides a Shout-out message of the case from public view. The participant Action keeps
     * its state (state-machines.md: taking down a reported message does not move it).
     *
     * @throws ModerationException CASE_NOT_FOUND, CASE_CLOSED, INVALID_INPUT or NOT_APPLICABLE
     */
    public function hideMessage(Member $moderator, string $casePublicId, string $messagePublicId, string $reason): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
