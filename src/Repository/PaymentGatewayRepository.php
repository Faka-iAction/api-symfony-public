<?php

namespace App\Repository;

use App\Entity\PaymentGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PaymentGateway>
 */
class PaymentGatewayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findFor(string $provider, string $countryCode): ?PaymentGateway
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
