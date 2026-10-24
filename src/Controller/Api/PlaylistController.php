<?php

namespace App\Controller\Api;

use App\Api\Request\CreatePlaylistItemRequest;
use App\Api\Request\CreatePlaylistRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\Rules;
use App\Api\Request\UpdatePlaylistItemRequest;
use App\Api\Request\UpdatePlaylistRequest;
use App\Api\Response\ActionPresenter;
use App\Api\Response\ApiResponse;
use App\Block\Action\PlaylistBlock;
use App\Entity\Playlist;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The creator's playlists and their items under /me/playlists. Needs the CREATOR capability.
 */
final class PlaylistController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly PlaylistBlock $playlists,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/playlists', name: 'api_v1_list_own_playlists', methods: [Request::METHOD_GET])]
    public function listOwnPlaylists(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/playlists', name: 'api_v1_create_playlist', methods: [Request::METHOD_POST])]
    public function createPlaylist(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/playlists/{playlistId}', name: 'api_v1_update_playlist', methods: [Request::METHOD_PATCH])]
    public function updatePlaylist(string $playlistId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/playlists/{playlistId}/items', name: 'api_v1_list_playlist_items', methods: [Request::METHOD_GET])]
    public function listPlaylistItems(string $playlistId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/playlists/{playlistId}/items', name: 'api_v1_add_playlist_item', methods: [Request::METHOD_POST])]
    public function addPlaylistItem(string $playlistId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/playlists/{playlistId}/items/{itemId}', name: 'api_v1_update_playlist_item', methods: [Request::METHOD_PATCH])]
    public function updatePlaylistItem(string $playlistId, string $itemId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/playlists/{playlistId}/items/{itemId}', name: 'api_v1_remove_playlist_item', methods: [Request::METHOD_DELETE])]
    public function removePlaylistItem(string $playlistId, string $itemId, Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
