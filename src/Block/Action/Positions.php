<?php

namespace App\Block\Action;

use App\Entity\ActionOption;
use App\Entity\PlaylistItem;

/**
 * Keeps the display order of options and playlist items as 1..n with no gaps.
 *
 * A position past the end places the entry last (an undecided rule: the contract gives
 * the minimum, 1, and no maximum).
 */
final class Positions
{
    /**
     * @template T of ActionOption|PlaylistItem
     *
     * @param list<T>  $others the other entries, in display order
     * @param T        $entry  the entry to place
     * @param int|null $target 1-based; null to place it last
     */
    public static function place(array $others, ActionOption|PlaylistItem $entry, ?int $target, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<ActionOption|PlaylistItem> $entries in display order
     */
    public static function renumber(array $entries, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @template T of ActionOption|PlaylistItem
     *
     * @param list<T> $entries
     *
     * @return list<T> the entries without the given one
     */
    public static function without(array $entries, ActionOption|PlaylistItem $entry): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
