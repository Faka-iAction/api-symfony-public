<?php

namespace App\Block\Action;

final readonly class DeadlineReport
{
    /**
     * @param int $creatorActionsMoved Creator Actions activated or expired by their start or end time
     * @param int $actionsExpired      participant Actions expired at their fulfilment deadline
     */
    public function __construct(
        public int $creatorActionsMoved,
        public int $actionsExpired,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
