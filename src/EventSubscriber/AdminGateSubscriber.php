<?php

namespace App\EventSubscriber;

use App\Admin\AdminRole;
use App\Admin\RequiresAdminRole;
use App\Block\Admin\AdminRoleBlock;
use App\Security\SignInTime;
use App\Security\WebMember;
use App\Web\ReturnPath;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * The server-side gate of every admin page and action, under /admin on the `main` (web
 * session) firewall (architecture 27 and 43.2; TIS 10.2).
 *
 * Before any admin controller runs:
 *
 * 1. The controller must name its roles with #[RequiresAdminRole]. One that does not is
 *    refused: the gate fails closed.
 * 2. The visitor must be a member signed in on the web who holds one of those roles now
 *    (read from the database on every request). Anyone else, a guest, a member with no admin
 *    role or an admin without that role, gets exactly what an unknown address gets: the
 *    router's 404, through the same exception. Nothing says that the page exists.
 * 3. The session's sign-in must be recent (ADMIN_STEP_UP_MAX_AGE seconds). An older one is
 *    sent to /admin/sign-in-again, and the page or action is not run. That page is the only
 *    one exempt from this step, and it is still behind steps 1 and 2.
 *
 * Every response of an admin page that was let through is never indexed and never stored.
 */
final readonly class AdminGateSubscriber implements EventSubscriberInterface
{
    public const PREFIX = '/admin';
    public const SIGN_IN_AGAIN_PATH = '/admin/sign-in-again';

    /** The admin's roles, set on the request once the gate has let it through. */
    public const ROLES_ATTRIBUTE = '_admin_roles';

    public function __construct(
        private Security $security,
        private AdminRoleBlock $roles,
        private SignInTime $signInTime,
        #[Autowire(env: 'int:ADMIN_STEP_UP_MAX_AGE')]
        private int $maxSignInAge,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function getSubscribedEvents(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function isAdminPath(Request $request): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<AdminRole>
     */
    public static function rolesOf(Request $request): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onKernelController(ControllerEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
