<?php

namespace App\Security;

use App\Web\ReturnPath;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

/**
 * A signed-in page asked for without a web session: to the sign-in page, which brings the
 * member back to the page afterwards. Only a page that can be opened again (GET) is
 * returned to, and only by its path on this site (ReturnPath).
 */
final readonly class WebSignInEntryPoint implements AuthenticationEntryPointInterface
{
    public function start(Request $request, ?AuthenticationException $authException = null): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
