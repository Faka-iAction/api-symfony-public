<?php

namespace App\Block\Qr;

use App\Block\Audit\AuditActor;
use App\Block\Creator\CreatorProfileBlock;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Entity\QrResource;
use App\Repository\CreatorProfileRepository;
use App\Repository\QrResourceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * A creator's own QR code (state-machines.md section 14): which code to print, and the two
 * things a creator does with it on the web.
 *
 * - Withdraw: the working code is revoked for good (printed copies stop working at once,
 *   for example after a poster was misused) and a new code is issued in the same
 *   transaction. Revocation by the creator is allowed from ACTIVE only here: a code that
 *   FAKA iAction suspended stays suspended, so withdrawing cannot be used to get round a
 *   moderation decision.
 * - Issue: a new code when the profile has none that works and none that is suspended, for
 *   example after an administrator revoked the last one. The profile must be public.
 *
 * Both run under the profile's row lock, so two clicks issue one code. Revocation is audited
 * with the member as actor (QrResourceBlock).
 */
final readonly class CreatorQrBlock
{
    public function __construct(
        private CreatorProfileBlock $creatorProfiles,
        private CreatorProfileRepository $profiles,
        private QrResourceRepository $resources,
        private QrResourceBlock $qrResources,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \App\Block\Creator\CreatorException PROFILE_NOT_FOUND
     */
    public function own(Member $member): CreatorQrView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \App\Block\Creator\CreatorException PROFILE_NOT_FOUND
     * @throws \DomainException                    when there is no working code to withdraw
     */
    public function withdraw(Member $member, string $reason): CreatorQrView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \App\Block\Creator\CreatorException PROFILE_NOT_FOUND
     * @throws \DomainException                    when a code works or is suspended, or the profile is not public
     */
    public function issue(Member $member): CreatorQrView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
