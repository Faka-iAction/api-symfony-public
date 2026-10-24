<?php

namespace App\Entity;

use App\Repository\ActionVoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * The type-specific part of a Vote: which option was chosen (domain model 4.8). Tallies
 * are counted from these rows; no counter column is authoritative.
 */
#[ORM\Entity(repositoryClass: ActionVoteRepository::class)]
#[ORM\Table(name: 'action_votes')]
#[ORM\Index(name: 'idx_action_votes_option', columns: ['action_option_id'])]
class ActionVote
{

    public function __construct(ParticipantAction $participantAction, ActionOption $option)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getParticipantAction(): ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOption(): ActionOption
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSelectionLabel(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
