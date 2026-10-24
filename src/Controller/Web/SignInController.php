<?php

namespace App\Controller\Web;

use App\Api\Request\Rules;
use App\Block\Identity\ContactIdentifier;
use App\Block\Identity\IdentityException;
use App\Block\Identity\IdentityFailure;
use App\Block\Identity\MemberBlock;
use App\Block\Identity\SignedIn;
use App\Block\Identity\SignInBlock;
use App\Security\SignInTime;
use App\Security\WebMember;
use App\Security\WebSessionAuthenticator;
use App\Web\ReturnPath;
use App\Web\WebCsrf;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\RateLimiter\RateLimiterFactoryInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Member sign-in and sign-out on the web (architecture 43.1; decisions 10, 13 and 14):
 * an email address or phone number with a one-time code, or an email address with a
 * password. Google and Apple are shown but not available yet.
 *
 * The same SignInBlock as the API decides every outcome. What the web adds is its own
 * session: Security::login() stores the member in the server-side session and gives it a
 * new ID; no API token is issued or read (architecture 22.3).
 *
 * Nothing on these pages tells whether an identifier is registered. Asking for a code
 * always sends one (a new identifier registers with it, as with the API's registerMember)
 * and leads to the same page; a wrong code, a wrong password and an unknown address get
 * the same answer. Every sign-in post counts against the API's authentication rate limit.
 */
final class SignInController extends WebController
{

    public function __construct(
        private readonly SignInBlock $signIn,
        private readonly WebCsrf $csrf,
        private readonly Security $security,
        private readonly ValidatorInterface $validator,
        #[Autowire(service: 'limiter.api_authentication')]
        private readonly RateLimiterFactoryInterface $limiter,
        private readonly SignInTime $signInTime,
        private readonly MemberBlock $members,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/sign-in', name: 'web_sign_in', methods: [Request::METHOD_GET])]
    public function show(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/sign-in', name: 'web_sign_in_start', methods: [Request::METHOD_POST])]
    public function start(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/sign-in/code', name: 'web_sign_in_code', methods: [Request::METHOD_GET])]
    public function code(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/sign-in/code', name: 'web_sign_in_code_check', methods: [Request::METHOD_POST])]
    public function checkCode(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/sign-in/password', name: 'web_sign_in_password', methods: [Request::METHOD_POST])]
    public function password(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Google and Apple are the decided providers (decision 13), but neither is connected on
     * this server yet: the button leads here, and nothing is signed in.
     */
    #[Route('/sign-in/{provider}', name: 'web_sign_in_social', requirements: ['provider' => 'google|apple'], methods: [Request::METHOD_GET])]
    public function social(string $provider): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/sign-out', name: 'web_sign_out', methods: [Request::METHOD_POST])]
    public function signOut(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/signed-out', name: 'web_signed_out', methods: [Request::METHOD_GET])]
    public function signedOut(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
