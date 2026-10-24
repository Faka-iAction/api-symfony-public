<?php

namespace App\Block\Action;

use App\Action\ParticipationSettings;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Identity\SecretFactory;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\GuestSessionRepository;
use App\Repository\ParticipantActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Guest sessions (CONVENTIONS.md 12.6; decision 23): a limited principal for a visitor who
 * takes part without registering. Creating one never creates a member.
 *
 * The token is opaque and random; only its SHA-256 is stored, so a copy of the database
 * cannot be used as a guest. A session lasts the configured time and every successful use
 * renews it.
 */
final readonly class GuestSessionBlock
{
    public const TOKEN_PREFIX = 'gt_';

    public function __construct(
        private GuestSessionRepository $sessions,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private ParticipationSettings $settings,
        private ClockInterface $clock,
        private Outbox $outbox,
        private ParticipantActionRepository $participants,
        private AuditLogBlock $audit,
        private ActionTransaction $transactions,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string|null $country a hint only, never trusted for a decision
     * @param string|null $locale  a hint only
     */
    public function create(?string $country, ?string $locale): IssuedGuestSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Resolves a guest token and renews the session.
     *
     * @throws ActionException GUEST_TOKEN_INVALID for an unknown and an expired token alike
     */
    public function authenticate(#[\SensitiveParameter] string $token): GuestSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The live session of a guest token, without renewing it: for deciding what a page
     * shows (the navigation), which is not a use of the session.
     */
    public function peek(#[\SensitiveParameter] string $token): ?GuestSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Explicit guest-to-member conversion (architecture 5.1 and 5.2; domain model 3.10): the
     * member confirms that this guest session's Actions are theirs. Called only on that
     * confirmation, by the member signed in, for the guest session of their own browser;
     * nothing ever converts a session silently.
     *
     * The Actions are linked, not copied or moved: each keeps its guest reference, and the
     * session records the member and the time. From then on the member reads them as their
     * own (ParticipantActionRepository), and the guest token is no longer accepted, so
     * nothing more can be added to a converted session.
     *
     * Decided under the session's row lock: of two confirmations at the same moment, one
     * converts and the other finds it done. Converting a session already converted (to this
     * member or another) changes nothing and records nothing, nor does converting a session
     * that has no Actions.
     *
     * @return int how many Actions were linked to the member; 0 when nothing changed
     *
     * @throws ActionException GUEST_TOKEN_INVALID when the session has expired
     */
    public function convert(GuestSession $session, Member $member): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
