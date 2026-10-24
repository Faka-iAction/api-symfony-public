<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Entity\ActionOption;
use App\Entity\CreatorAction;
use App\Entity\Member;
use App\Identity\SecretFactory;
use App\Repository\ActionOptionRepository;
use App\Repository\CreatorActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The choices a creator offers on a Request or Vote (domain model 4.3). Options are not part
 * of the versioned configuration: changing them never changes `configVersion` (contract
 * item 57). Participant Actions keep the label they chose, so a later change does not
 * rewrite their history.
 *
 * Every change runs under the Creator Action's row lock, the one submissions take: an
 * option cannot be removed while a submission that chose it is being stored, and two
 * changes renumber positions one after the other.
 */
final readonly class ActionOptionBlock
{
    public const LABEL = 'label';
    public const POSITION = 'position';
    public const STATUS = 'status';

    public function __construct(
        private CreatorActionBlock $creatorActions,
        private ActionOptionRepository $options,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private CreatorActionRepository $actions,
        private ActionTransaction $transactions,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * In display order, unavailable ones included. A type without options has none.
     *
     * @return Page<ActionOption>
     *
     * @throws ActionException CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND or INVALID_CURSOR
     */
    public function list(Member $member, string $creatorActionId, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND or CREATOR_ACTION_STATE_CONFLICT
     */
    public function add(Member $member, string $creatorActionId, string $label, ?int $position): ActionOption
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Setting the status to UNAVAILABLE stops new participants choosing it; Actions that
     * already chose it are unaffected.
     *
     * @param array<self::*, mixed> $changes validated by the caller
     *
     * @throws ActionException CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND, CREATOR_ACTION_STATE_CONFLICT or OPTION_NOT_FOUND
     */
    public function update(Member $member, string $creatorActionId, string $optionId, array $changes): ActionOption
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An option a participant Action has chosen stays: the creator makes it unavailable instead.
     *
     * @throws ActionException CAPABILITY_REQUIRED, CREATOR_ACTION_NOT_FOUND, OPTION_NOT_FOUND or OPTION_IN_USE
     */
    public function remove(Member $member, string $creatorActionId, string $optionId): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
