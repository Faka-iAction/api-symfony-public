<?php

namespace App\Block\Creator;

final readonly class FollowPage
{
    /**
     * @param list<FollowedCreator> $items
     * @param string|null           $nextCursor null exactly when there is no further page
     */
    public function __construct(
        public array $items,
        public int $limit,
        public ?string $nextCursor,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
