<?php

namespace App\Web;

/**
 * Where a member goes after signing in. Only a path on this site is ever followed: it must
 * start with a single "/", and it may not hold a scheme, a host, a backslash, a control
 * character or white space. Anything else is dropped, so a sign-in link can never send a
 * member to another site.
 */
final class ReturnPath
{
    /** Where a member goes when there is no valid return path. */
    public const DEFAULT = '/me';

    public static function validate(mixed $path): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function orDefault(mixed $path): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
