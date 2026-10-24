<?php

namespace App\Controller\Web;

use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorFailure;
use App\Web\MemberNavigation;
use App\Web\ReturnPath;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Following (architecture 4.4): the creators the member follows, and following or
 * unfollowing one from their page. The same FollowBlock as the API's listFollowedCreators,
 * followCreator and unfollowCreator: both are idempotent, and a follow names the creator's
 * public ID, sent in the form body, never in the address.
 *
 * Every change is a POST with the session's CSRF token, answered with a redirect back to
 * the page it came from (only a path on this site, ReturnPath).
 */
final class FollowingController extends SignedInController
{

    #[Route('/following', name: 'web_following', methods: [Request::METHOD_GET])]
    public function list(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/following', name: 'web_follow', methods: [Request::METHOD_POST])]
    public function follow(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/following/remove', name: 'web_unfollow', methods: [Request::METHOD_POST])]
    public function unfollow(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
