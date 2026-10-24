<?php

namespace App\Block\Action;

use App\Action\ActionConfig;
use App\Entity\CreatorAction;

/**
 * A Creator Action with its current configuration.
 */
final readonly class CreatorActionView
{
    public function __construct(
        public CreatorAction $action,
        public ActionConfig $config,
        /** ACTIVE, inside its window, on a public profile, at the time the view was made. */
        public bool $openForParticipation = false,
        /**
         * A Bid's ranking now (contract BidRankingSummary): how many bids are ranked and the
         * top total in minor units; null for any other type, or where it was not loaded.
         *
         * @var array{rankedBidCount: int, topBidTotalMinor: int|null}|null
         */
        public ?array $bidRanking = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function canonicalPath(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
