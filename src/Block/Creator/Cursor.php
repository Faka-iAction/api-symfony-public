<?php

namespace App\Block\Creator;

/**
 * Opaque page cursors. A cursor names the last item of a page by its public identifier,
 * so it exposes nothing the caller has not already been given, and it may carry a
 * fingerprint of the filters it was issued for.
 */
final class Cursor
{
    public static function encode(string $afterPublicId, ?string $filters = null): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return string|null the public identifier the cursor names, or null when the cursor is
     *                     not one this API issued, or was issued for other filters
     */
    public static function decode(string $cursor, ?string $filters = null): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
