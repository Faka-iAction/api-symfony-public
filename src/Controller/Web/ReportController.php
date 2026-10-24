<?php

namespace App\Controller\Web;

use App\Block\Moderation\ModerationException;
use App\Block\Moderation\ReportBlock;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Moderation\Moderation;
use App\Security\WebMember;
use App\Web\GuestCookie;
use App\Web\PublicUrls;
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
 * Reporting a creator or a Creator Action (architecture 28), from the "Report" link on their
 * public pages. Anyone may report: a member signed in on the web as themselves (with the
 * session's CSRF token), anyone else as a guest (with the stateless, same-origin form
 * protection and the guest cookie, as a guest's participation is). No contact detail is
 * asked for.
 *
 * ReportBlock decides everything: the subject must be public, the reason one of the
 * categories, and the optional details must pass the same automatic screening as a
 * Shout-out message. Submissions are limited per client address. The pages are never
 * indexed and never stored.
 */
final class ReportController extends WebController
{
    public const CSRF_TOKEN_ID = 'web_report';

    public function __construct(
        private readonly ReportBlock $reports,
        private readonly GuestCookie $guestCookie,
        private readonly CsrfTokenManagerInterface $csrf,
        private readonly WebCsrf $memberCsrf,
        #[Autowire(service: 'limiter.web_report')]
        private readonly RateLimiterFactoryInterface $limiter,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/report/{kind}/{subjectId}', name: 'web_report', requirements: ['kind' => 'creator|action', 'subjectId' => '[0-9A-Z]{26}'], methods: [Request::METHOD_GET])]
    public function show(string $kind, string $subjectId): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/report/{kind}/{subjectId}', name: 'web_report_file', requirements: ['kind' => 'creator|action', 'subjectId' => '[0-9A-Z]{26}'], methods: [Request::METHOD_POST])]
    public function fileReport(string $kind, string $subjectId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/report/sent', name: 'web_report_sent', methods: [Request::METHOD_GET])]
    public function sent(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
