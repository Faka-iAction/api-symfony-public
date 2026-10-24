<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\PayoutRunRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One payout run (app:payouts:run): which creators it looked at and what it did. A record
 * for operators (the admin payouts page); the money is in the payouts and the ledger.
 *
 * `status`: RUNNING, FINISHED, or BLOCKED (the legal gate refused live payouts, or no
 * provider key is configured: nothing was recorded or sent).
 */
#[ORM\Entity(repositoryClass: PayoutRunRepository::class)]
#[ORM\Table(name: 'payout_runs')]
#[ORM\UniqueConstraint(name: 'uniq_payout_runs_public_id', columns: ['public_id'])]
#[ORM\Index(name: 'idx_payout_runs_started', columns: ['started_at'])]
class PayoutRun
{
    public const RUNNING = 'RUNNING';
    public const FINISHED = 'FINISHED';
    public const BLOCKED = 'BLOCKED';

    public function __construct(string $publicId, string $triggeredBy, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getTriggeredBy(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getBlockedReason(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorsConsidered(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayoutsCreated(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The sum of the amounts sent by the payouts it created (one currency in MVP1: ZAR). */
    public function getAmountMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStartedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFinishedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function finish(int $creatorsConsidered, int $payoutsCreated, int $amountMinor, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function block(string $reason, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
