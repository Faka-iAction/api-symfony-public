<?php

namespace App\Block\Moderation;

use App\Block\Action\IssuedGuestSession;
use App\Entity\Report;

/**
 * A report that was filed, and the guest session issued with it when the reporter had none.
 */
final readonly class FiledReport
{
    public function __construct(public Report $report, public ?IssuedGuestSession $issuedGuest)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
