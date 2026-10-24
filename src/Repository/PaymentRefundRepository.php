<?php

namespace App\Repository;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\Payment;
use App\Entity\PaymentRefund;
use App\Payment\PaymentState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PaymentRefund>
 */
class PaymentRefundRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findForPayment(Payment $payment): ?PaymentRefund
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<int> $paymentIds
     *
     * @return list<int> those of the payments that have a refund of ours, in any status
     */
    public function paymentIdsWithRefund(array $paymentIds): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<int> keys of REQUESTED refunds that are due and not leased, oldest first
     */
    public function findDue(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Takes a REQUESTED refund for sending: one conditional UPDATE, committed at once by the
     * caller's connection (no transaction is open), so of two workers only one sends it, and
     * a worker that dies after this leaves the row SENDING, never REQUESTED: it is then
     * reconciled as an unknown outcome, never sent again on its own.
     */
    public function claim(int $id, string $token, \DateTimeImmutable $now, \DateTimeImmutable $until): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A SENDING refund whose worker's lease has run out: the worker died while sending, so
     * whether the provider received the request is unknown.
     *
     * @return list<PaymentRefund>
     */
    public function findAbandonedSending(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<string> $statuses
     *
     * @return list<PaymentRefund>
     */
    public function findInStatuses(array $statuses, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The row as the database holds it now. */
    public function reload(int $id): ?PaymentRefund
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
