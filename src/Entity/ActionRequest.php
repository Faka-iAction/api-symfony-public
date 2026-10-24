<?php

namespace App\Entity;

use App\Repository\ActionRequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * The type-specific part of a Request: what was chosen (domain model 4.7). The labels are
 * copied as they read when chosen, which is what the contract's ActionSelection shows.
 * Exactly one of option and playlist item is set.
 */
#[ORM\Entity(repositoryClass: ActionRequestRepository::class)]
#[ORM\Table(name: 'action_requests')]
#[ORM\Index(name: 'idx_action_requests_option', columns: ['action_option_id'])]
#[ORM\Index(name: 'idx_action_requests_playlist_item', columns: ['playlist_item_id'])]
class ActionRequest
{

    public function __construct(ParticipantAction $participantAction, ?ActionOption $option, ?PlaylistItem $playlistItem, ?string $note)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getParticipantAction(): ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOption(): ?ActionOption
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPlaylistItem(): ?PlaylistItem
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSelectionPublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSelectionLabel(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSelectionSecondaryLabel(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getNote(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
