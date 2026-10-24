<?php

namespace App\Repository;

use App\Block\Action\Participant;
use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\Payment;
use App\Entity\CreatorProfile;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Entity\ParticipantAction;
use App\Payment\PaymentState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Payment>
 */
class PaymentRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A payment of one of the participant's own Actions; someone else's is not told apart from
     * one that does not exist.
     */
    public function findForParticipant(Participant $participant, string $publicId): ?Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findByReference(string $provider, string $reference): ?Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The Action's payments, oldest first.
     *
     * @return list<Payment>
     */
    public function forAction(ParticipantAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The Action's payments, locked and reloaded. The caller holds the Action's row lock.
     *
     * @return list<Payment>
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForAction(ParticipantAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Open payments whose checkout window has closed.
     *
     * @return list<Payment>
     */
    public function findOpenPastExpiry(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Payments made at or after a time, oldest first, after a key: what reconciliation reads.
     *
     * @return list<Payment>
     */
    public function findCreatedSince(\DateTimeImmutable $since, int $afterId, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * For the risk limits: how much a payer started or paid since a moment, and how many such
     * payments there were. Only payments that may still take money or took it count (open and
     * confirmed); failed and expired ones do not.
     *
     * @return array{amountMinor: int, count: int}
     */
    public function totalsForPayer(?Member $member, ?GuestSession $guest, \DateTimeImmutable $since): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * For the risk limits: how much was started or paid for one creator since a moment.
     */
    public function totalForCreator(CreatorProfile $profile, \DateTimeImmutable $since): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }}
