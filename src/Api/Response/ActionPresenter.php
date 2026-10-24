<?php

namespace App\Api\Response;

use App\Action\ActionConfig;
use App\Action\Money;
use App\Block\Action\CreatorActionView;
use App\Block\Action\Page;
use App\Block\Action\PlaylistView;
use App\Entity\ActionOption;
use App\Entity\PlaylistItem;

/**
 * The response shapes of the Creator Action management operations, field for field as the
 * contract's schemas list them.
 */
final class ActionPresenter
{

    /**
     * Schema: CreatorAction. The owner's view, configuration included.
     *
     * @return array<string, mixed>
     */
    public static function creatorAction(CreatorActionView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: CreatorActionPage.
     *
     * @param Page<CreatorActionView> $page
     *
     * @return array<string, mixed>
     */
    public static function creatorActionPage(Page $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: CreatorActionConfig.
     *
     * @return array<string, mixed>
     */
    public static function config(ActionConfig $config): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: ActionOption.
     *
     * @return array<string, mixed>
     */
    public static function option(ActionOption $option): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: Playlist.
     *
     * @return array<string, mixed>
     */
    public static function playlist(PlaylistView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PlaylistItem.
     *
     * @return array<string, mixed>
     */
    public static function playlistItem(PlaylistItem $item): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @template T
     *
     * @param Page<T>                          $page
     * @param callable(T): array<string, mixed> $item
     *
     * @return array<string, mixed>
     */
    public static function page(Page $page, callable $item): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{amountMinor: int, currency: string}|null
     */
    public static function money(?Money $money): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function timestamp(\DateTimeImmutable $time): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function timestampOrNull(?\DateTimeImmutable $time): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
