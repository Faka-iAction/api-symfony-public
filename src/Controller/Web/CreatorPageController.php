<?php

namespace App\Controller\Web;

use App\Block\Action\ActionException;
use App\Block\Action\PublicCreatorActionBlock;
use App\Block\Creator\CreatorDirectoryBlock;
use App\Block\Creator\CreatorException;
use App\Block\Creator\FollowBlock;
use App\Security\WebMember;
use App\Web\ConsumerNavigation;
use App\Web\PublicUrls;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The public creator page, `/@handle` (architecture 6 and 6.1), from the same Blocks as the
 * API's getPublicCreatorByHandle and listPublicCreatorActions.
 *
 * A former handle, or the current one written in other letter case, answers with a
 * permanent redirect (301) to the canonical address (decision 11): browsers and search
 * engines then move to the current handle.
 *
 * A member signed in on the web also gets a Follow or Unfollow button (FollowBlock, a POST
 * with the session's CSRF token) and their navigation; that page is private and never
 * indexed. Everyone else gets the same public page, which invites them to sign in to follow.
 */
final class CreatorPageController extends WebController
{

    public function __construct(
        private readonly CreatorDirectoryBlock $directory,
        private readonly PublicCreatorActionBlock $publicActions,
        private readonly FollowBlock $follows,
        private readonly ConsumerNavigation $navigation,
        private readonly PublicUrls $urls,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/@{handle}', name: 'web_creator', requirements: ['handle' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function __invoke(string $handle, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
