<?php

namespace App\Controller\Web;

use App\Block\Creator\FollowBlock;
use App\Block\Identity\MemberBlock;
use App\Entity\Member;
use App\Entity\MemberCapability;
use App\Security\WebMember;
use App\Web\MemberNavigation;
use App\Web\WebCsrf;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * What the signed-in web pages share. Every one of them is behind the `main` firewall's
 * access rule (config/packages/security.yaml), is never indexed and never cached, and
 * checks the session-based CSRF token of every form it accepts. The member comes from the
 * web session only; an API token is never read here (architecture 22.3).
 */
abstract class SignedInController extends WebController
{
    protected MemberBlock $members;
    protected WebCsrf $csrf;
    protected FollowBlock $follows;

    #[Required]
    public function setSignedInServices(MemberBlock $members, WebCsrf $csrf, FollowBlock $follows): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function member(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function isCreator(Member $member): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<string, mixed> $parameters
     * @param string               $mode       MemberNavigation::CREATOR or MemberNavigation::FAN
     * @param string               $current    the tab the page belongs to
     */
    protected function signedInPage(string $template, array $parameters, string $mode, string $current, int $status = Response::HTTP_OK): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The form's CSRF token is missing or not this session's: nothing is changed, and the
     * page says so plainly.
     */
    protected function refusedForm(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function checked(Request $request): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * POST-redirect-GET: every accepted form answers with a 303 to the page to show next.
     */
    protected function seeOther(string $path): RedirectResponse
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected static function text(mixed $value): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected static function optional(mixed $value): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
