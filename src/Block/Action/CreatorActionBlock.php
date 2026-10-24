<?php

namespace App\Block\Action;

use App\Action\ActionConfig;
use App\Action\ActionState;
use App\Action\ActionType;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Country\CountryBlock;
use App\Block\Country\CountryPolicyException;
use App\Block\Creator\Cursor;
use App\Entity\CreatorAction;
use App\Entity\CreatorActionConfig;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Entity\Playlist;
use App\Identity\SecretFactory;
use App\Repository\ActionBidRepository;
use App\Repository\CreatorActionConfigRepository;
use App\Repository\CreatorActionRepository;
use App\Repository\PlaylistRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\LockMode;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;

/**
 * A creator's own Creator Actions: creating, reading and changing one, and the creator's
 * transitions of its lifecycle (state-machines.md section 2; decisions 6, 17, 18 and 19).
 *
 * Every refusal is decided before anything is written. Each change runs in one transaction
 * with the state history it records, holding the Creator Action's row lock: two changes to
 * one Creator Action run one after the other, and the second decides on what the first
 * committed (ActionTransaction).
 */
final readonly class CreatorActionBlock
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const STARTS_AT = 'startsAt';
    public const ENDS_AT = 'endsAt';
    public const CONFIG = 'config';

    public function __construct(
        private CreatorAccess $access,
        private CreatorActionRepository $actions,
        private CreatorActionConfigRepository $configs,
        private PlaylistRepository $playlists,
        private CreatorActionLifecycle $lifecycle,
        private ActionHistory $history,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private ActionTransaction $transactions,
        private AuditLogBlock $audit,
        private CountryBlock $countries,
        private ActionBidRepository $bids,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Creates a Creator Action in DRAFT with configuration version 1. The configuration may
     * be incomplete; what does not apply to the type, or lies outside policy, is refused.
     *
     * The creator's country must be ACTIVE, and the configuration is held to that country's
     * policy as it is now (currencies, maximum amount, maximum fulfilment period, guests).
     *
     * @throws ActionException        CAPABILITY_REQUIRED, COUNTRY_NOT_AVAILABLE, INVALID_INPUT or ACTION_SLUG_TAKEN
     * @throws CountryPolicyException when the country's mandatory policy is missing or invalid (fail safe)
     */
    public function create(Member $member, CreatorActionInput $input): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Every state, most recently updated first.
     *
     * @return Page<CreatorActionView>
     *
     * @throws ActionException CAPABILITY_REQUIRED or INVALID_CURSOR
     */
    public function listOwn(Member $member, ?string $state, ?string $type, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CAPABILITY_REQUIRED or CREATOR_ACTION_NOT_FOUND
     */
    public function getOwn(Member $member, string $publicId): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Partial update. A change to the configuration creates the next version, which applies
     * to new participants only (decision 19); a change to the title, description or times
     * alone does not. Type and slug never change.
     *
     * Moving the end time of an EXPIRED Creator Action into the future, or removing it,
     * makes it ACTIVE again (DN-02, a proposal; contract item 50).
     *
     * The change is worked out from the Creator Action as loaded here. If another request
     * changed it before this one takes the lock, the update is refused with
     * CREATOR_ACTION_STATE_CONFLICT rather than written over that change (a lost update).
     *
     * @param array<self::*, mixed> $changes validated by the caller; `config` is an array keyed by
     *                                       contract field name, amounts as Money
     *
     * @throws ActionException        CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_STATE_CONFLICT,
     *                                INVALID_INPUT or CREATOR_ACTION_NOT_PUBLISHABLE
     * @throws CountryPolicyException when the country's mandatory policy is missing or invalid (fail safe)
     */
    public function update(Member $member, string $publicId, array $changes): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * DRAFT to PUBLISHED, then at once to ACTIVE when there is no start time or it has passed
     * (decision 17). Repeating it on a PUBLISHED or ACTIVE Creator Action changes nothing.
     *
     * The configuration is checked again against the country's policy as it is now: a value
     * that was within policy when the draft was saved but is not any more is not published.
     *
     * @throws ActionException        CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_STATE_CONFLICT
     *                                or CREATOR_ACTION_NOT_PUBLISHABLE
     * @throws CountryPolicyException when the country's mandatory policy is missing or invalid (fail safe)
     */
    public function publish(Member $member, string $publicId): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * ACTIVE to PAUSED. Open participant Actions run on to their own deadlines (decision 6).
     *
     * @throws ActionException CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND or CREATOR_ACTION_STATE_CONFLICT
     */
    public function pause(Member $member, string $publicId): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * PAUSED to ACTIVE, provided the end time has not passed (DN-02).
     *
     * @throws ActionException CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND or CREATOR_ACTION_STATE_CONFLICT
     */
    public function resume(Member $member, string $publicId): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Any state to DISABLED. Every unfulfilled participant Action on it, free or paid, is
     * cancelled in the same transaction (decisions 6 and 18). Repeating it changes nothing.
     *
     * @throws ActionException CAPABILITY_REQUIRED or CREATOR_ACTION_NOT_FOUND
     */
    public function disable(Member $member, string $publicId): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CAPABILITY_REQUIRED or CREATOR_ACTION_NOT_FOUND
     */
    public function own(Member $member, string $publicId): CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function view(CreatorAction $action): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Applies the start and end times that have been reached (CreatorActionLifecycle::advance()).
     *
     * Only a Creator Action that looks due is locked; the lock reloads it and advance()
     * decides again on the reloaded row, so two requests (or a request and the deadline
     * command) that both find it due apply the transition once.
     *
     * @param list<CreatorAction> $actions
     */
    public function advanceAll(array $actions): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
