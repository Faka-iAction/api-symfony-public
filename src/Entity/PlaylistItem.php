<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\PlaylistItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One selectable entry in a playlist (domain model 4.5).
 *
 * Positions are kept as 1..n without gaps by the Block. The domain model's unique
 * (playlist, position) is an index here, not a unique constraint: moving an item renumbers
 * its neighbours, and MySQL checks a unique index row by row during such an UPDATE.
 */
#[ORM\Entity(repositoryClass: PlaylistItemRepository::class)]
#[ORM\Table(name: 'playlist_items')]
#[ORM\UniqueConstraint(name: 'uniq_playlist_items_public_id', columns: ['public_id'])]
#[ORM\Index(name: 'idx_playlist_items_playlist_position', columns: ['playlist_id', 'position'])]
class PlaylistItem
{

    public function __construct(string $publicId, Playlist $playlist, string $title, ?string $artist, int $position, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPlaylist(): Playlist
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTitle(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getArtist(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPosition(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isAvailable(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function change(string $title, ?string $artist, bool $available, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function moveTo(int $position, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
