<?php

namespace App\Web;

use App\Entity\Member;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Absolute URLs on the platform's own web origin, for canonical links, Open Graph tags and
 * share links. Built from the configured origin (DEFAULT_URI), never from the request's
 * Host header, so a forged Host cannot end up in a canonical tag or a shared link.
 */
final readonly class PublicUrls
{

    public function __construct(
        #[Autowire(env: 'DEFAULT_URI')]
        string $origin,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $path a path on this site, starting with "/"
     */
    public function absolute(string $path): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function creatorPath(string $handle): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A member's referral code and joining link (ui-spec 9.3). There are no referral codes in
     * the API yet, so the code is made from the member's name and id, as the reference does.
     *
     * @return array{code: string, url: string}
     */
    public function invite(Member $member): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
