<?php

namespace App\Web;

use App\Block\Action\ParticipantActionBlock;
use App\Block\Creator\FollowBlock;
use App\Block\Identity\MemberBlock;
use App\Entity\MemberCapability;
use App\Security\WebMember;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Which consumer navigation the current visitor gets (architecture 4.4), for the pages
 * that every visitor can open: Discover, Activity, a creator's page, a Creator Action and
 * a status page.
 *
 * - A member signed in on the web: fan mode, with Following once they follow two or more.
 * - A guest whose browser holds a guest session that has sent at least one Action:
 *   Discover and Activity.
 * - Anyone else (a new guest): none.
 *
 * Asking reads the web session only when the browser sent one, and reads the guest session
 * without renewing it, so it changes nothing.
 */
final readonly class ConsumerNavigation
{
    public function __construct(
        private Security $security,
        private RequestStack $requests,
        private MemberBlock $members,
        private FollowBlock $follows,
        private GuestCookie $guestCookie,
        private ParticipantActionBlock $actions,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $current the tab the page belongs to, or '' for none
     *
     * @return array{mode: string, current: string, signedIn: bool, tabs: list<array{key: string, label: string, path: string}>, switch: array{label: string, path: string}|null}|null
     */
    public function for(string $current): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
