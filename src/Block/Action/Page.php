<?php

namespace App\Block\Action;

/**
 * One page of a collection.
 *
 * @template T
 */
final readonly class Page
{
    /**
     * @param list<T>     $items
     * @param string|null $nextCursor null exactly when there is no further page
     */
    public function __construct(
        public array $items,
        public int $limit,
        public ?string $nextCursor,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
