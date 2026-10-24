<?php

namespace App\Command;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Payment\ReconciliationBlock;
use App\Payment\Provider\PayoutsNotApproved;
use App\Payment\Provider\ProviderException;
use App\Payment\Provider\ProviderNotConfigured;
use Psr\Clock\ClockInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Compares the payments made in a recent period with the provider's verify answers, the
 * payouts made in the period (and those still in flight) with the provider's transfer status,
 * and FAKA's Paystack balance with what the ledger says it holds, and lists every difference
 * in reconciliation_exceptions (ReconciliationBlock). Reads and lists only. Every run is
 * audited with what it compared and found. With a live key and the legal gate closed, the
 * payout and balance checks make no request; that is audited and the command fails.
 */
#[AsCommand(name: self::NAME, description: 'Compares recent payments with the payment provider and lists the differences.')]
final class ReconcilePaymentsCommand extends Command
{
    public const NAME = 'app:payments:reconcile';

    public function __construct(
        private readonly ReconciliationBlock $reconciliation,
        private readonly AuditLogBlock $audit,
        private readonly ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function configure(): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
