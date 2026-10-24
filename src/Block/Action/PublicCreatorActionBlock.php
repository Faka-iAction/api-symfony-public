<?php

namespace App\Block\Action;

use App\Action\ActionType;
use App\Block\Creator\CreatorDirectoryBlock;
use App\Block\Creator\CreatorException;
use App\Block\Creator\Cursor;
use App\Entity\ActionOption;
use App\Entity\CreatorAction;
use App\Entity\PlaylistItem;
use App\Repository\ActionOptionRepository;
use App\Repository\CreatorActionConfigRepository;
use App\Repository\CreatorActionRepository;
use App\Repository\PlaylistItemRepository;

/**
 * What the public sees of a creator's Creator Actions: only PUBLISHED, ACTIVE and PAUSED
 * ones on a publicly visible profile (decision 17). Draft, expired and disabled ones are
 * not told apart from ones that never existed.
 */
final readonly class PublicCreatorActionBlock
{
    public function __construct(
        private CreatorDirectoryBlock $directory,
        private CreatorActionRepository $actions,
        private CreatorActionConfigRepository $configs,
        private ActionOptionRepository $options,
        private PlaylistItemRepository $items,
        private CreatorActionBlock $creatorActions,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Newest first. An old handle resolves to the same creator.
     *
     * @return Page<CreatorActionView>
     *
     * @throws CreatorException CREATOR_NOT_FOUND
     * @throws ActionException  INVALID_CURSOR
     */
    public function list(string $handle, ?string $type, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws CreatorException CREATOR_NOT_FOUND
     * @throws ActionException  CREATOR_ACTION_NOT_FOUND
     */
    public function get(string $handle, string $slug): CreatorActionView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The choices of a public Creator Action, from its own options or from its playlist, in
     * display order, unavailable ones included. `q` matches the label and the second label,
     * without regard to case.
     *
     * @return Page<PublicChoice>
     *
     * @throws ActionException CREATOR_ACTION_NOT_FOUND or INVALID_CURSOR
     */
    public function choices(string $creatorActionId, ?string $text, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Every choice the current configuration offers, in display order.
     *
     * @return list<PublicChoice>
     */
    public function allChoices(CreatorAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
