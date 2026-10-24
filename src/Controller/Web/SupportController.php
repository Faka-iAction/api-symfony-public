<?php

namespace App\Controller\Web;

use App\Block\Support\SupportBlock;
use App\Block\Support\SupportException;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Security\WebMember;
use App\Support\Support;
use App\Web\ConsumerNavigation;
use App\Web\GuestCookie;
use App\Web\WebCsrf;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\RateLimiter\RateLimiterFactoryInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

/**
 * Support (ui-spec 8.12, screenshot 55): how FAKA iAction works first, then asking for help
 * and the conversations one has had (SupportBlock). The reference's "contact details are not
 * set up" notice is replaced by the request form.
 *
 * A member signed in on the web asks as themselves (the session's CSRF token); anyone else
 * asks as a guest of this browser (stateless same-origin protection and the guest cookie, as
 * a report is). Sending is limited per client address. Never indexed, never stored.
 */
final class SupportController extends WebController
{
    public const CSRF_TOKEN_ID = 'web_support';

    public function __construct(
        private readonly SupportBlock $support,
        private readonly GuestCookie $guestCookie,
        private readonly CsrfTokenManagerInterface $csrf,
        private readonly WebCsrf $memberCsrf,
        private readonly ConsumerNavigation $navigation,
        #[Autowire(service: 'limiter.web_support')]
        private readonly RateLimiterFactoryInterface $limiter,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/support', name: 'web_support', methods: [Request::METHOD_GET])]
    public function show(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/support', name: 'web_support_open', methods: [Request::METHOD_POST])]
    public function open(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/support/{ticketId}', name: 'web_support_ticket', requirements: ['ticketId' => self::TICKET_ID], methods: [Request::METHOD_GET])]
    public function ticket(string $ticketId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/support/{ticketId}', name: 'web_support_reply', requirements: ['ticketId' => self::TICKET_ID], methods: [Request::METHOD_POST])]
    public function reply(string $ticketId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
