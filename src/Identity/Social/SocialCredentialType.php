<?php

namespace App\Identity\Social;

/**
 * The credential shapes of the contract (SocialCredential schema).
 */
enum SocialCredentialType: string
{
    case ID_TOKEN = 'id_token';
    case AUTHORIZATION_CODE = 'authorization_code';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
