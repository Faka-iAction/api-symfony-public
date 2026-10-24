<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\CreatorProfile;
use App\Entity\LedgerEntry;
use App\Entity\Payment;
use App\Payment\LedgerAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Reads of the append-only ledger. Nothing here updates or deletes a line.
 *
 * @extends ServiceEntityRepository<LedgerEntry>
 */
class LedgerEntryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function hasJournal(string $journalKey): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<LedgerEntry> in line order
     */
    public function journal(string $journalKey): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<LedgerEntry>
     */
    public function forPayment(Payment $payment): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's lines on one account, summed per payment and currency, with the
     * payment's state: what the pending balance is derived from.
     *
     * @return list<array{currency: string, paymentState: string|null, amount: int}>
     */
    public function sumsByPayment(CreatorProfile $profile, string $account): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The sum of the creator's lines on one account, per currency.
     *
     * @return array<string, int>
     */
    public function accountSumsByCurrency(CreatorProfile $profile, string $account): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The sum of every line on one account, per currency, all creators and the platform:
     * what balance reconciliation compares with the provider.
     *
     * @return array<string, int>
     */
    public function totalByCurrency(string $account): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * What is owed to creators: per currency, the sum over creators of each creator's
     * entitlement where it is positive (a creator who owes does not reduce what is owed to others).
     *
     * @return array<string, int>
     */
    public function owedToCreatorsByCurrency(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's entitlement lines of payments in the given states, summed per payment,
     * with what decides whether the payment still blocks a payout: its state, when it was
     * confirmed and its Action's state.
     *
     * @param list<string> $paymentStates
     *
     * @return list<array{currency: string, paymentId: int, paymentState: string, confirmedAt: \DateTimeImmutable|null, actionState: string, amount: int}>
     */
    public function openPaymentSums(CreatorProfile $profile, array $paymentStates): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<string> $accounts
     */
    public function findCreatorEntry(CreatorProfile $profile, array $accounts, string $publicId): ?LedgerEntry
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's lines on the given accounts, most recent first.
     *
     * @param list<string> $accounts
     *
     * @return list<LedgerEntry>
     */
    public function pageForCreator(CreatorProfile $profile, array $accounts, ?string $entryType, ?\DateTimeImmutable $from, ?\DateTimeImmutable $before, ?LedgerEntry $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
