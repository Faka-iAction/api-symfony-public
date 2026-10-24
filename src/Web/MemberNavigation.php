<?php

namespace App\Web;

/**
 * The navigation of the web (architecture 4.4 and 25.4), revealed progressively.
 *
 * Consumer experience, at most four tabs: Discover, Activity, Following and Profile.
 * - A new guest: no navigation at all (ConsumerNavigation returns none).
 * - A guest after a successful Action: Discover and Activity.
 * - A member following 0 or 1 creators: Discover, Activity and Profile.
 * - A member following 2 or more: Discover, Activity, Following and Profile. Following stays
 *   hidden until the member follows more than one creator.
 *
 * Creator experience, at most five tabs: Home, Actions, Activity, More and Profile. New
 * capabilities go under More, never into a new tab.
 *
 * The experience switch exists only once the member has the creator capability, and it is
 * not part of the tabs: it sits on Discover (to creator mode) and on the creator Home (back
 * to fan mode). `switch` says where it leads; the page decides whether to show it.
 */
final class MemberNavigation
{
    public const CREATOR = 'creator';
    public const FAN = 'fan';
    /** A guest who has taken part: not signed in. */
    public const GUEST = 'guest';

    /** Following appears from this many followed creators. */
    public const FOLLOWING_TAB_FROM = 2;

    public const CREATOR_TABS = [
        'home' => ['Home', '/creator'],
        'actions' => ['Actions', '/creator/actions'],
        'activity' => ['Activity', '/creator/activity'],
        'more' => ['More', '/creator/more'],
        'profile' => ['Profile', '/creator/profile'],
    ];

    public const CONSUMER_TABS = [
        'discover' => ['Discover', '/discover'],
        'activity' => ['Activity', '/activity'],
        'following' => ['Following', '/following'],
        'profile' => ['Profile', '/me/profile'],
    ];

    /**
     * A signed-in member.
     *
     * @param int $following how many creators the member follows (fan mode only)
     *
     * @return array{mode: string, current: string, signedIn: bool, tabs: list<array{key: string, label: string, path: string}>, switch: array{label: string, path: string}|null}
     */
    public static function for(string $mode, bool $isCreator, string $current, int $following = 0): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A guest who has taken part at least once: Discover and Activity.
     *
     * @return array{mode: string, current: string, signedIn: bool, tabs: list<array{key: string, label: string, path: string}>, switch: array{label: string, path: string}|null}
     */
    public static function guest(string $current): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
