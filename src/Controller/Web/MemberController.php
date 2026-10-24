<?php

namespace App\Controller\Web;

use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorFailure;
use App\Block\Creator\CreatorProfileBlock;
use App\Block\Creator\CreatorProfileInput;
use App\Block\Identity\IdentifierBlock;
use App\Block\Identity\MemberBlock;
use App\Creator\CreatorDefaults;
use App\Twig\WebExtension;
use App\Web\MemberNavigation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The member's own pages in fan mode: the profile, and becoming a creator (architecture 39:
 * handle, name and category, then straight to the creator home). The same Blocks as the
 * API's updateOwnMember, listOwnIdentifiers and createOwnCreatorProfile.
 */
final class MemberController extends SignedInController
{

    public function __construct(
        private readonly IdentifierBlock $identifiers,
        private readonly CreatorProfileBlock $creatorProfiles,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me', name: 'web_me', methods: [Request::METHOD_GET])]
    public function home(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/profile', name: 'web_me_profile', methods: [Request::METHOD_GET])]
    public function profile(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/profile', name: 'web_me_profile_save', methods: [Request::METHOD_POST])]
    public function saveProfile(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/become-creator', name: 'web_become_creator', methods: [Request::METHOD_GET])]
    public function becomeCreator(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/me/become-creator', name: 'web_become_creator_save', methods: [Request::METHOD_POST])]
    public function saveBecomeCreator(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
