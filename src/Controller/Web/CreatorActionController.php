<?php

namespace App\Controller\Web;

use App\Action\ActionDefaults;
use App\Action\ActionState;
use App\Action\ActionType;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Action\ActionOptionBlock;
use App\Block\Action\CreatorAccess;
use App\Block\Action\CreatorActionBlock;
use App\Block\Action\CreatorActionInput;
use App\Block\Action\CreatorActionView;
use App\Block\Action\IncomingActionBlock;
use App\Block\Action\PlaylistBlock;
use App\Block\Action\VoteTallyBlock;
use App\Block\Country\CountryBlock;
use App\Block\Country\CountryPolicyException;
use App\Entity\ActionOption;
use App\Entity\Playlist;
use App\Web\CreatorActionForm;
use App\Web\PublicUrls;
use Psr\Clock\ClockInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The creator's Creator Actions (architecture 4.4 "Actions"; state-machines.md section 2):
 * listing, creating, editing, publishing, pausing, resuming and turning off, and the options
 * of a Request or Vote. The same Blocks as the API's /me/creator-actions operations; every
 * rule is theirs, and their refusals are worded here.
 *
 * Turning off (disable) has a confirmation page of its own, saying that everything open on
 * the Creator Action is cancelled (decisions 6 and 18). Editing a live Creator Action
 * creates a new configuration version for new participants only (decision 19), and the
 * edit page says so.
 */
final class CreatorActionController extends CreatorAreaController
{

    public function __construct(
        private readonly CreatorActionBlock $creatorActions,
        private readonly ActionOptionBlock $options,
        private readonly PlaylistBlock $playlists,
        private readonly IncomingActionBlock $incoming,
        private readonly CreatorAccess $access,
        private readonly CountryBlock $countries,
        private readonly ClockInterface $clock,
        private readonly PublicUrls $urls,
        private readonly VoteTallyBlock $tallies,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions', name: 'web_creator_actions', methods: [Request::METHOD_GET])]
    public function list(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/new', name: 'web_creator_action_new', methods: [Request::METHOD_GET], priority: 10)]
    public function chooseType(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/new/{typeSlug}', name: 'web_creator_action_create_form', methods: [Request::METHOD_GET], priority: 10)]
    public function newForm(string $typeSlug): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/new/{typeSlug}', name: 'web_creator_action_create', methods: [Request::METHOD_POST], priority: 10)]
    public function create(string $typeSlug, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}', name: 'web_creator_action_show', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function show(string $id): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/edit', name: 'web_creator_action_edit_form', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function editForm(string $id): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/edit', name: 'web_creator_action_edit', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function edit(string $id, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/{transition}', name: 'web_creator_action_transition', requirements: ['id' => '[^/]+', 'transition' => 'publish|pause|resume'], methods: [Request::METHOD_POST])]
    public function transition(string $id, string $transition, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/disable', name: 'web_creator_action_disable_confirm', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function confirmDisable(string $id): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/disable', name: 'web_creator_action_disable', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function disable(string $id, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/options', name: 'web_creator_action_option_add', requirements: ['id' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function addOption(string $id, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/options/{optionId}', name: 'web_creator_action_option_update', requirements: ['id' => '[^/]+', 'optionId' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function updateOption(string $id, string $optionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/actions/{id}/options/{optionId}/remove', name: 'web_creator_action_option_remove', requirements: ['id' => '[^/]+', 'optionId' => '[^/]+'], methods: [Request::METHOD_POST])]
    public function removeOption(string $id, string $optionId, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
