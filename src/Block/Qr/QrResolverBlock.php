<?php

namespace App\Block\Qr;

use App\Block\Creator\CreatorException;
use App\Block\Creator\CreatorFailure;
use App\Creator\CreatorDefaults;
use App\Entity\QrResource;
use App\Repository\QrResourceRepository;
use Psr\Clock\ClockInterface;

/**
 * Resolves a scanned QR identifier (contract operation resolveQr).
 *
 * The destination is only ever the owning creator's own profile, named by its current
 * handle, so a code keeps working after a rename and can never point off the platform
 * or at another recipient. Resolving grants nothing.
 */
final readonly class QrResolverBlock
{

    public function __construct(
        private QrResourceRepository $resources,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws CreatorException QR_NOT_FOUND for an unknown or malformed identifier, without saying which
     */
    public function resolve(string $qrId): QrResolution
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
