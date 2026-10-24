<?php

namespace App\Controller\Web;

use App\Action\ActionState;
use App\Block\Action\ParticipantActionBlock;
use App\Web\MemberNavigation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The member's Inbox and the account dialogs of Profile (ui-spec 8.10, 8.11, 9.5, 9.6).
 *
 * - The Inbox (screenshot 30): there is no notifications API yet, so it is made from the
 *   member's own Actions, as the app does: every one that is no longer waiting, newest
 *   change first.
 * - Deactivate and Delete (screenshot 31): the dialogs are built, but the platform has
 *   neither operation yet. Confirming says so, and nothing is changed.
 */
final class AccountController extends SignedInController
{

    public function __construct(
        private readonly ParticipantActionBlock $actions,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/inbox', name: 'web_me_inbox', methods: [Request::METHOD_GET])]
    public function inbox(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/deactivate', name: 'web_me_deactivate', methods: [Request::METHOD_POST])]
    public function deactivate(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/delete', name: 'web_me_delete', methods: [Request::METHOD_POST])]
    public function delete(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
