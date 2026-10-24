<?php

namespace App\Command;

use App\Block\Payout\PayoutBlock;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * A payout run (decision 26; PayoutBlock::run()): records a payout for every creator with a
 * payable amount at or above PAYOUTS_MINIMUM_MINOR and sends it. Safe to run again: a
 * creator with a payout in flight is skipped, so running twice pays once. With a live key
 * and the legal gate closed nothing is recorded or sent; the run is audited as blocked and
 * the command fails.
 */
#[AsCommand(name: self::NAME, description: 'Records and sends the payouts that are due.')]
final class RunPayoutsCommand extends Command
{
    public const NAME = 'app:payouts:run';

    public function __construct(private readonly PayoutBlock $payouts)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
