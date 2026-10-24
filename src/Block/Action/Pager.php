<?php

namespace App\Block\Action;

use App\Block\Creator\Cursor;

/**
 * Pages through a list already loaded in display order: options and playlist items, which
 * belong to one Creator Action or one playlist. The cursor names the last entry of the
 * previous page and the filters it was issued for.
 */
final class Pager
{
    /**
     * @template T
     *
     * @param list<T>             $ordered
     * @param callable(T): string $publicIdOf
     *
     * @return Page<T>
     *
     * @throws ActionException INVALID_CURSOR
     */
    public static function slice(array $ordered, ?string $cursor, string $filters, int $limit, callable $publicIdOf): Page
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
