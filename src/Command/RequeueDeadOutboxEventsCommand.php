<?php

namespace App\Command;

use App\Block\Audit\AuditActor;
use App\Block\Outbox\OutboxOperationsBlock;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Puts dead outbox events back in the queue with a fresh attempt count, after an operator
 * has fixed what made them fail. Each requeued event is recorded in the audit log, in the
 * same transaction as the requeue (OutboxOperationsBlock, which the admin outbox page uses
 * too). The events themselves are not changed, so consumers that already handled one skip it.
 */
#[AsCommand(
    name: self::NAME,
    description: 'Puts dead outbox events back to pending so the relay publishes them again.',
)]
final class RequeueDeadOutboxEventsCommand extends Command
{
    public const NAME = 'app:outbox:requeue';

    public function __construct(
        private readonly OutboxOperationsBlock $outbox,
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
