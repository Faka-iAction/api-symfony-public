<?php

namespace App\Twig;

use App\Action\ActionState;
use App\Block\Action\ActionException;
use App\Block\Action\IncomingActionBlock;
use App\Block\Action\ParticipantActionBlock;
use App\Block\Creator\CreatorDirectoryBlock;
use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorProfileBlock;
use App\Block\Creator\CreatorView;
use App\Block\Creator\FollowBlock;
use App\Security\WebMember;
use App\Web\MemberNavigation;
use App\Web\PublicUrls;
use Symfony\Bundle\SecurityBundle\Security;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * The desktop shell (ui/desktop/design.md): what the sidebar and the right-hand panel show.
 * The same pages and data as on a phone; only the shell is new. CSS shows the shell from
 * 900 px wide and hides it below, where the phone layout is used.
 *
 * - Sidebar: the account card (initials, name, "Fan", "Creator" or "Creator, fan mode"), the
 *   mode label, and the count of waiting items on the creator's Activity.
 * - Right panel, by who is looking:
 *   - a guest: the sign-up card and the first four creators;
 *   - a member (fan mode): who they follow (up to five) and their latest three Actions;
 *   - a creator (creator mode): what waits for them (count and the three oldest) and their
 *     page link.
 *
 * Member data is read only when the page's navigation says a member is signed in, so a
 * guest's page opens no session and shows only public data. The panel is read only by pages
 * that show it: error, status and sign-in pages turn it off.
 */
final class DesktopExtension extends AbstractExtension
{

    public function __construct(
        private readonly Security $security,
        private readonly FollowBlock $follows,
        private readonly ParticipantActionBlock $actions,
        private readonly IncomingActionBlock $incoming,
        private readonly CreatorProfileBlock $creatorProfiles,
        private readonly CreatorDirectoryBlock $directory,
        private readonly PublicUrls $urls,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFunctions(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The sidebar: the account card, the mode label and the waiting count.
     *
     * @param array<string, mixed>|null $nav the page's navigation (MemberNavigation), or null
     *
     * @return array{account: array{name: string, initials: string, role: string}|null, modeLabel: string|null, badge: int}
     */
    public function desktop(?array $nav): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The right panel's cards. Read only on pages that show the panel.
     *
     * @param array<string, mixed>|null $nav
     *
     * @return array<string, mixed>
     */
    public function panel(?array $nav): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
