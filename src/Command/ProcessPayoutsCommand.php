<?php

namespace App\Command;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Payout\PayoutBlock;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * The payout worker's round (PayoutBlock::processDue()): payouts whose outcome is unknown
 * are verified with the provider (never sent again), and recorded payouts that are due are
 * sent. Safe to run as often as wanted, for example every minute. Transfer notifications are
 * processed by app:payments:process with the other provider notifications.
 */
#[AsCommand(name: self::NAME, description: 'Verifies payouts whose outcome is unknown and sends the payouts that are due.')]
final class ProcessPayoutsCommand extends Command
{
    public const NAME = 'app:payouts:process';

    public function __construct(
        private readonly PayoutBlock $payouts,
        private readonly AuditLogBlock $audit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
