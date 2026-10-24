<?php

namespace App\Controller\Api;

use App\Api\ApiRoute;
use App\Api\Request\RefreshTokenRequest;
use App\Api\Request\RegisterMemberRequest;
use App\Api\Request\RequestReader;
use App\Api\Request\SignInRequest;
use App\Api\Request\SocialSignInRequest;
use App\Api\Request\StartSignInRequest;
use App\Api\Response\ApiResponse;
use App\Api\Response\IdentityPresenter;
use App\Block\Identity\SessionBlock;
use App\Block\Identity\SignInBlock;
use App\Security\AuthenticatedMember;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The contract's Identity operations: registration, sign-in and the token lifecycle.
 */
final class IdentityController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly SignInBlock $signIn,
        private readonly SessionBlock $sessions,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/members', name: 'api_v1_register_member', methods: [Request::METHOD_POST], defaults: ApiRoute::SIGN_IN_DEFAULTS)]
    public function registerMember(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/auth/verifications', name: 'api_v1_start_sign_in', methods: [Request::METHOD_POST], defaults: ApiRoute::SIGN_IN_DEFAULTS)]
    public function startSignIn(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/auth/tokens', name: 'api_v1_sign_in', methods: [Request::METHOD_POST], defaults: ApiRoute::SIGN_IN_DEFAULTS)]
    public function signIn(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/auth/tokens/social', name: 'api_v1_sign_in_with_social', methods: [Request::METHOD_POST], defaults: ApiRoute::SIGN_IN_DEFAULTS)]
    public function signInWithSocial(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/auth/tokens/refresh', name: 'api_v1_refresh_token', methods: [Request::METHOD_POST], defaults: ApiRoute::SIGN_IN_DEFAULTS)]
    public function refreshToken(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/auth/sign-out', name: 'api_v1_sign_out', methods: [Request::METHOD_POST])]
    public function signOut(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
