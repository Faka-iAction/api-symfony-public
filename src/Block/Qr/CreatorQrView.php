<?php

namespace App\Block\Qr;

use App\Entity\CreatorProfile;
use App\Entity\QrResource;

final readonly class CreatorQrView
{
    /**
     * @param QrResource|null $current   the code that resolves now, the one to print
     * @param bool            $suspended no code works because one is suspended
     * @param bool            $canIssue  no code works or is pending, none is suspended, and the profile is public
     */
    public function __construct(
        public CreatorProfile $profile,
        public ?QrResource $current,
        public bool $suspended,
        public bool $canIssue,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
