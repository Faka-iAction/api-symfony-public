<?php

namespace App\Controller\Web;

use App\Action\ActionDefaults;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\PlaylistBlock;
use App\Entity\Playlist;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The creator's playlists (under More): the lists a Request can take its choices from. The
 * same Block as the API's /me/playlists operations.
 */
final class PlaylistController extends CreatorAreaController
{

    public function __construct(private readonly PlaylistBlock $playlists)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/playlists', name: 'web_creator_playlists', methods: [Request::METHOD_GET])]
    public function list(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/playlists', name: 'web_creator_playlist_create', methods: [Request::METHOD_POST])]
    public function create(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/playlists/{id}', name: 'web_creator_playlist', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function show(string $id): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/playlists/{id}', name: 'web_creator_playlist_update', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function update(string $id, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/playlists/{id}/items', name: 'web_creator_playlist_item_add', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function addItem(string $id, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/playlists/{id}/items/{itemId}', name: 'web_creator_playlist_item_update', requirements: ['id' => '[^/]+', 'itemId' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function updateItem(string $id, string $itemId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/playlists/{id}/items/{itemId}/remove', name: 'web_creator_playlist_item_remove', requirements: ['id' => '[^/]+', 'itemId' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function removeItem(string $id, string $itemId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
