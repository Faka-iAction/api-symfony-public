<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\ActionBidRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * The ranking part of a Bid (domain model `action_bids`; architecture 7.4.1; state-machines.md
 * section 6). One per participant Action of type BID, created with it.
 *
 * - `total_minor` is the sum of the bid's confirmed payments: the first payment plus every
 *   confirmed raise. Zero until the first payment is confirmed.
 * - A bid is ranked (`ranked`) from its first confirmed payment until it leaves the ranking
 *   (fulfilled, rejected, cancelled or expired). Rank is an attribute, not a state: being
 *   outbid changes `current_rank` and nothing else.
 * - Ties are ordered by earliest confirmed payment that brought the bid to its current total
 *   (architecture 7.4.1; DN-15). `reached_sequence` records that order exactly: it is the next
 *   number among the Creator Action's bids, taken under the Creator Action's lock when the
 *   payment is applied, so two confirmations in the same second are still ordered.
 *   `total_reached_at` keeps the time for people to read.
 * - `final_rank` keeps the rank the bid had when it left the ranking.
 *
 * What arbitrates concurrent bids is the Creator Action's row lock: every change to any bid
 * of a Creator Action (a confirmation, a raise, a bid leaving the ranking) runs under it
 * (ParticipantActionRepository::lockForUpdate()), and the ranks are recalculated there.
 */
#[ORM\Entity(repositoryClass: ActionBidRepository::class)]
#[ORM\Table(name: 'action_bids')]
#[ORM\UniqueConstraint(name: 'uniq_action_bids_participant_action', columns: ['participant_action_id'])]
#[ORM\Index(name: 'idx_action_bids_ranking', columns: ['creator_action_id', 'ranked', 'current_rank'])]
class ActionBid
{

    public function __construct(ParticipantAction $participantAction, string $currency, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getParticipantAction(): ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorAction(): CreatorAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTotalMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRaiseCount(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isRanked(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrentRank(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFinalRank(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTotalReachedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReachedSequence(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTotalReachedPayment(): ?Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTermsAcknowledgedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRankedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLeftRankingAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The first payment was confirmed: the bid enters the ranking with that payment's amount.
     * Only BidRankingBlock calls this, under the Creator Action's lock.
     */
    public function enterRanking(Payment $payment, int $sequence, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A raise payment was confirmed: the total grows by the raise. Only while ranked.
     */
    public function raise(Payment $payment, int $sequence, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The bid left the ranking (fulfilled, rejected, cancelled or expired). Its last rank is
     * kept as the final rank.
     */
    public function leaveRanking(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return bool whether the rank changed
     */
    public function rankAs(?int $rank, \DateTimeImmutable $now): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
