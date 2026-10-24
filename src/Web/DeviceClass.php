<?php

namespace App\Web;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Phone or not, for the home page (product owner, 2026-10-24): a desktop visitor's `/` is
 * the website (website.html); a phone goes straight to the web app, which matches the
 * Flutter app. `/discover` opens the web app on any device.
 *
 * The User-Agent Client Hint Sec-CH-UA-Mobile decides when the browser sends it (Chromium
 * does by default); otherwise the User-Agent string. Tablets that call themselves desktop
 * browsers get the website, and can open the app from it.
 */
final class DeviceClass
{
    /** The request headers the answer depends on, for the response's Vary header. */
    public const VARY = ['Sec-CH-UA-Mobile', 'User-Agent'];

    public static function isMobile(Request $request): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Marks a response as depending on the device class, so caches keep both answers apart. */
    public static function vary(Response $response): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
