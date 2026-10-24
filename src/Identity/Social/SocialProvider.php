<?php

namespace App\Identity\Social;

/**
 * The social login providers of the contract (SocialProvider schema; decision 13).
 */
enum SocialProvider: string
{
    case GOOGLE = 'google';
    case APPLE = 'apple';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
