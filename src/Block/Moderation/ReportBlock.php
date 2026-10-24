<?php

namespace App\Block\Moderation;

use App\Action\Screening\MessageScreener;
use App\Block\Action\GuestSessionBlock;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Entity\ModerationCase;
use App\Entity\Report;
use App\Identity\SecretFactory;
use App\Moderation\Moderation;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\CreatorActionRepository;
use App\Repository\CreatorProfileRepository;
use App\Repository\ModerationCaseRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;

/**
 * Filing a report about a public creator or a public Creator Action (architecture 28: report
 * creator, report Creator Action). Anyone may report, a member or a guest; no contact detail
 * is asked for. The optional details pass the same automatic screening as a Shout-out
 * message (decision 22) before anything is stored.
 *
 * A report joins the open moderation case of its subject, or opens one (at most one open case
 * per subject, a database rule). It is written with its audit entry (REPORT_FILED) and its
 * event (ReportFiled, a proposed name) in one transaction. The details are in neither.
 *
 * A guest without a guest session is given one, as a guest's first participation is: the
 * report needs exactly one reporter (domain model 10.1).
 *
 * No API operation files a report yet (a contract gap); the web report form is the only
 * caller. Nothing is decided automatically: every report waits for a moderator.
 */
final readonly class ReportBlock
{
    public function __construct(
        private CreatorProfileRepository $profiles,
        private CreatorActionRepository $creatorActions,
        private ModerationCaseRepository $cases,
        private GuestSessionBlock $guests,
        private MessageScreener $screener,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private SecretFactory $secrets,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The subject of a report, if it is public now: what a report form may be shown for.
     *
     * @throws ModerationException SUBJECT_NOT_FOUND
     */
    public function subject(string $subjectType, string $subjectPublicId): CreatorProfile|CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param Member|null       $member the member reporting; null for a guest
     * @param GuestSession|null $guest  the guest's session, if they have one; ignored for a member
     *
     * @throws ModerationException SUBJECT_NOT_FOUND, INVALID_INPUT, SCREENING_REFUSED or CONFLICT
     */
    public function file(?Member $member, ?GuestSession $guest, string $subjectType, string $subjectPublicId, string $reasonCode, ?string $details): FiledReport
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
