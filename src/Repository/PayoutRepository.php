<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\CreatorProfile;
use App\Entity\Payout;
use App\Entity\PayoutRun;
use App\Payment\PayoutStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Payout>
 */
class PayoutRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByReference(string $provider, string $reference): ?Payout
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByPublicId(string $publicId): ?Payout
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Payout> the creator's payouts that are not final
     */
    public function findInFlightFor(CreatorProfile $profile): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<int> keys of PENDING payouts that are due and not leased, oldest first
     */
    public function findDue(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Takes a PENDING payout for sending: one conditional UPDATE, committed at once (no
     * transaction is open), so of two workers only one sends it, and a worker that dies after
     * this leaves the row SENDING, never PENDING: it is then verified as an unknown outcome,
     * never sent again on its own.
     */
    public function claim(int $id, string $token, \DateTimeImmutable $now, \DateTimeImmutable $until): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * SENDING payouts whose worker's lease has run out: whether the provider received the
     * request is unknown.
     *
     * @return list<Payout>
     */
    public function findAbandonedSending(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<string> $statuses
     *
     * @return list<Payout>
     */
    public function findInStatuses(array $statuses, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Payouts made at or after $since, or not final whenever made: what reconciliation compares.
     *
     * @return list<Payout>
     */
    public function findForReconciliation(\DateTimeImmutable $since, int $afterId, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The row as the database holds it now. */
    public function reload(int $id): ?Payout
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * What the creator's entitlement was charged for paid payouts, per currency.
     *
     * @return array<string, int>
     */
    public function paidGrossByCurrency(CreatorProfile $profile): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's payouts, most recent first.
     *
     * @return list<Payout>
     */
    public function pageForCreator(CreatorProfile $profile, ?string $publicStatus, ?Payout $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findForCreator(CreatorProfile $profile, string $publicId): ?Payout
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Payout> payouts that failed or were reversed, or whose outcome is unknown, most recent first
     */
    public function findNeedingAttention(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Payout>
     */
    public function findForRun(PayoutRun $run): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
