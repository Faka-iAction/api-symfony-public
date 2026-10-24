<?php

namespace App\Block\Payment;

use App\Entity\Payment;
use App\Entity\Payout;
use App\Entity\ProviderNotification;
use App\Entity\ReconciliationIssue;
use App\Identity\SecretFactory;
use App\Repository\ReconciliationIssueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;

/**
 * Lists a difference between the platform and the provider for an operator
 * (`reconciliation_exceptions`). The same difference found again is counted on its existing
 * row. Only persists: the caller's transaction writes it.
 */
final readonly class ReconciliationIssues
{
    public function __construct(
        private ReconciliationIssueRepository $issues,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $dedupKey what makes this difference the same one when it is found again
     */
    public function record(
        string $kind,
        string $dedupKey,
        ?Payment $payment,
        ?ProviderNotification $notification = null,
        ?string $reference = null,
        ?int $reportedAmountMinor = null,
        ?string $reportedCurrency = null,
        ?string $providerStatus = null,
        ?Payout $payout = null,
        ?int $expectedAmountMinor = null,
        ?string $expectedCurrency = null,
    ): ReconciliationIssue {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
