<?php

namespace App\Block\Action;

use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Entity\MemberCapability;
use App\Repository\CreatorProfileRepository;
use App\Repository\MemberCapabilityRepository;

/**
 * The creator operations under /me/creator-actions, /me/playlists and /me/incoming-actions
 * need the CREATOR capability and act only on the caller's own profile (CONVENTIONS.md
 * 12.5). Only self-managed profiles exist in MVP1, so nobody acts on another's behalf.
 */
final readonly class CreatorAccess
{
    public function __construct(
        private MemberCapabilityRepository $capabilities,
        private CreatorProfileRepository $profiles,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException CAPABILITY_REQUIRED
     */
    public function profileOf(Member $member): CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
