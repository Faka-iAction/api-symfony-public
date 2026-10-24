<?php

namespace App\Block\Action;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Entity\ActionOption;
use App\Entity\CreatorAction;
use App\Entity\Member;
use App\Repository\ActionOptionRepository;
use App\Repository\CreatorActionRepository;
use App\Repository\ParticipantActionRepository;

/**
 * Vote tallies: counted from the votes that count, never from a counter column (domain
 * model 4.3). Participants see them once voting closes, not before (decision 21); the
 * creator who owns the vote sees them at any time.
 *
 * No operation of contract 1.0.0-alpha.1 returns a tally (CONVENTIONS.md item 60 is still
 * open), so this Block has no HTTP entry point yet.
 */
final readonly class VoteTallyBlock
{
    public function __construct(
        private CreatorActionRepository $creatorActions,
        private ActionOptionRepository $options,
        private ParticipantActionRepository $participants,
        private CreatorActionBlock $creatorActionBlock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<array{optionId: string, label: string, votes: int}>|null null while voting is still open
     *
     * @throws ActionException CREATOR_ACTION_NOT_FOUND
     */
    public function forParticipant(string $creatorActionId): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<array{optionId: string, label: string, votes: int}>
     *
     * @throws ActionException CAPABILITY_REQUIRED or CREATOR_ACTION_NOT_FOUND
     */
    public function forCreator(Member $member, string $creatorActionId): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
