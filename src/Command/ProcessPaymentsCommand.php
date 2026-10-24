<?php

namespace App\Command;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Payment\PaymentProcessingBlock;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Processes provider notifications, sends and settles automatic refunds, closes open
 * payments whose checkout window has passed and fails Actions that were never paid
 * (PaymentProcessingBlock). Safe to run as often as wanted, for example every minute.
 *
 * Run app:actions:process-deadlines as well: it expires unfulfilled Actions, which
 * requests their refunds; this command sends them.
 */
#[AsCommand(name: self::NAME, description: 'Processes payment notifications and refunds and closes expired checkouts.')]
final class ProcessPaymentsCommand extends Command
{
    public const NAME = 'app:payments:process';

    public function __construct(
        private readonly PaymentProcessingBlock $processing,
        private readonly AuditLogBlock $audit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
