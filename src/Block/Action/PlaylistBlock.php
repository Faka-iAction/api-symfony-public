<?php

namespace App\Block\Action;

use App\Block\Creator\Cursor;
use App\Entity\Member;
use App\Entity\Playlist;
use App\Entity\PlaylistItem;
use App\Identity\SecretFactory;
use App\Repository\CreatorActionConfigRepository;
use App\Repository\PlaylistItemRepository;
use App\Repository\PlaylistRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;

/**
 * A creator's playlists and their items (domain model 4.4 and 4.5): the lists a Request
 * can be limited to. Names are unique within the profile, compared without regard to case.
 */
final readonly class PlaylistBlock
{
    public const NAME = 'name';
    public const STATUS = 'status';
    public const TITLE = 'title';
    public const ARTIST = 'artist';
    public const POSITION = 'position';
    public const AVAILABLE = 'available';

    public function __construct(
        private CreatorAccess $access,
        private PlaylistRepository $playlists,
        private PlaylistItemRepository $items,
        private CreatorActionConfigRepository $configs,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private ActionTransaction $transactions,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * By name.
     *
     * @return Page<PlaylistView>
     *
     * @throws ActionException CAPABILITY_REQUIRED or INVALID_CURSOR
     */
    public function list(Member $member, ?string $status, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One of the creator's own playlists, with its item count.
     *
     * @throws ActionException CAPABILITY_REQUIRED or PLAYLIST_NOT_FOUND
     */
    public function get(Member $member, string $playlistId): PlaylistView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CAPABILITY_REQUIRED or PLAYLIST_NAME_TAKEN
     */
    public function create(Member $member, string $name): PlaylistView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Rename, archive or restore. A playlist that a Creator Action's current configuration
     * uses cannot be archived; one used only by a disabled Creator Action can.
     *
     * @param array<self::NAME|self::STATUS, mixed> $changes validated by the caller
     *
     * @throws ActionException CAPABILITY_REQUIRED, PLAYLIST_NOT_FOUND, PLAYLIST_NAME_TAKEN or PLAYLIST_IN_USE
     */
    public function update(Member $member, string $playlistId, array $changes): PlaylistView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * In display order, unavailable ones included.
     *
     * @return Page<PlaylistItem>
     *
     * @throws ActionException CAPABILITY_REQUIRED, PLAYLIST_NOT_FOUND or INVALID_CURSOR
     */
    public function listItems(Member $member, string $playlistId, int $limit, ?string $cursor): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CAPABILITY_REQUIRED or PLAYLIST_NOT_FOUND
     */
    public function addItem(Member $member, string $playlistId, string $title, ?string $artist, ?int $position): PlaylistItem
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An item that is not available cannot be chosen by new participants.
     *
     * @param array<self::TITLE|self::ARTIST|self::POSITION|self::AVAILABLE, mixed> $changes validated by the caller
     *
     * @throws ActionException CAPABILITY_REQUIRED, PLAYLIST_NOT_FOUND or PLAYLIST_ITEM_NOT_FOUND
     */
    public function updateItem(Member $member, string $playlistId, string $itemId, array $changes): PlaylistItem
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An item a participant has chosen stays: the creator makes it unavailable instead.
     *
     * @throws ActionException CAPABILITY_REQUIRED, PLAYLIST_NOT_FOUND, PLAYLIST_ITEM_NOT_FOUND or OPTION_IN_USE
     */
    public function removeItem(Member $member, string $playlistId, string $itemId): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
