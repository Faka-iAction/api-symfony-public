<?php

namespace App\Repository;

use App\Entity\CashReceipt;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use App\Entity\ParticipantAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CashReceipt>
 */
class CashReceiptRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The Action's original cash receipt (never a correction), if cash was chosen.
     */
    public function findOriginalFor(ParticipantAction $action): ?CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Reloads the receipt under a write lock. The caller holds the Action's lock.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lock(CashReceipt $receipt): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findOwn(CreatorProfile $profile, string $publicId): ?CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The corrections of a receipt, oldest first.
     *
     * @return list<CashReceipt>
     */
    public function correctionsOf(CashReceipt $original): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The creator's receipts, most recently reported first (then newest record first).
     *
     * @return list<CashReceipt>
     */
    public function pageOwn(CreatorProfile $profile, bool $pendingOnly, ?string $state, ?CreatorAction $action, ?CashReceipt $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Every receipt of a creator, for the cash totals (never part of a balance).
     *
     * @return list<CashReceipt>
     */
    public function allFor(CreatorProfile $profile): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
