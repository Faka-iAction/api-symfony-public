<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Web\ReturnPath;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The admin home, which lists the sections the admin's roles allow, and the page that asks
 * for a fresh sign-in once the session's sign-in is too old (TIS 10.2, step-up).
 *
 * Signing in again is done by the ordinary web sign-in: this page signs the member out of
 * the old session (a POST with the admin CSRF token) and sends them to the sign-in page,
 * which brings them back to the admin page they wanted. The new session records a new
 * sign-in time.
 */
final class AdminHomeController extends AdminController
{
    public function __construct(private readonly Security $security)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin', name: 'admin_home', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole]
    public function home(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/sign-in-again', name: 'admin_sign_in_again', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(recentSignIn: false)]
    public function signInAgain(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/sign-in-again', name: 'admin_sign_in_again_start', methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(recentSignIn: false)]
    public function startSignInAgain(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
