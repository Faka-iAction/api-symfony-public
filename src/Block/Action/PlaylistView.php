<?php

namespace App\Block\Action;

use App\Entity\Playlist;

final readonly class PlaylistView
{
    public function __construct(
        public Playlist $playlist,
        public int $itemCount,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
