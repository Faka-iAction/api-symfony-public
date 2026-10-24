<?php

namespace App\Controller\Web;

use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Country\CountryPolicyException;
use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorFailure;
use App\Web\MemberNavigation;
use Symfony\Component\HttpFoundation\Response;

/**
 * What the creator pages share. The Blocks decide who may see and change what: a member
 * without the creator capability is sent to become one, and anything that is not the
 * member's own (another creator's Creator Action, option, playlist or queue item) is the
 * same not-found page as something that does not exist.
 */
abstract class CreatorAreaController extends SignedInController
{
    /**
     * @param array<string, mixed> $parameters
     */
    protected function creatorPage(string $template, array $parameters, string $current, int $status = Response::HTTP_OK): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Runs the page and answers the refusals every creator page has in common.
     *
     * @param callable(): Response $page
     */
    protected function guarded(callable $page): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The refusals any creator operation can meet: not a creator, or not the member's own.
     */
    protected function common(ActionException $refusal): ?Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
