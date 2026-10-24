<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\AdminRole;
use App\Controller\Web\WebController;
use App\Entity\Member;
use App\EventSubscriber\AdminGateSubscriber;
use App\Security\WebMember;
use App\Web\WebCsrf;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * What the admin pages share. Every action of a subclass carries #[RequiresAdminRole];
 * AdminGateSubscriber has checked it, the member's roles and the recent sign-in before the
 * action runs. An action that changes something is a POST with the admin CSRF token and
 * answers with a redirect (POST-redirect-GET).
 *
 * Admin pages read and change data through the Blocks only (architecture 27: the admin UI
 * never manipulates the database directly). There is no impersonation of any member.
 */
abstract class AdminController extends WebController
{
    protected WebCsrf $csrf;

    #[Required]
    public function setAdminServices(WebCsrf $csrf, RequestStack $requests): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function admin(): Member
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<AdminRole>
     */
    protected function roles(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<AdminRole> $allowed
     */
    protected function holds(array $allowed): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<string, mixed> $parameters
     * @param string               $section    the AdminNavigation section the page belongs to
     */
    protected function adminPage(string $template, array $parameters, string $section, int $status = Response::HTTP_OK): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function checked(Request $request): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The form's CSRF token is missing or not this session's: nothing is changed.
     */
    protected function refusedForm(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function seeOther(string $path): RedirectResponse
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected static function text(mixed $value): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
