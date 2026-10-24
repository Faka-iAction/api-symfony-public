<?php

namespace App\Block\Qr;

/**
 * What a scan may learn about a code: the public statuses of the contract's QrResolution.
 */
enum QrStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case EXPIRED = 'expired';
    case REVOKED = 'revoked';
    case DESTINATION_UNAVAILABLE = 'destination_unavailable';
}
