<?php

namespace App\Controller\Web;

use App\Block\Action\ActionException;
use App\Block\Action\GuestSessionBlock;
use App\Block\Action\ParticipantActionBlock;
use App\Entity\GuestSession;
use App\Web\GuestCookie;
use App\Web\MemberNavigation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Keeping a guest's history in an account (architecture 5.1 and 5.2), `/me/keep-history`.
 *
 * A guest who has taken part is offered this, never pushed. The offer leads here; a visitor
 * who is not signed in is sent through the ordinary sign-in pages (which also register a
 * new member) and comes back. This page then shows what this browser's guest session holds
 * and asks the member to confirm. Only on that confirmation, a POST with the session's CSRF
 * token, does GuestSessionBlock::convert() link the guest session's Actions to the member,
 * with its audit entry and event. Signing in alone never does.
 *
 * Only the guest session of this browser's own guest cookie can be converted, and only by
 * the member signed in in the same browser. Afterwards the browser's guest cookie is
 * dropped. Converting again changes nothing.
 */
final class GuestConversionController extends SignedInController
{

    public function __construct(
        private readonly GuestSessionBlock $guests,
        private readonly ParticipantActionBlock $actions,
        private readonly GuestCookie $guestCookie,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/keep-history', name: 'web_keep_history', methods: [Request::METHOD_GET])]
    public function show(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/keep-history', name: 'web_keep_history_confirm', methods: [Request::METHOD_POST])]
    public function confirm(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
