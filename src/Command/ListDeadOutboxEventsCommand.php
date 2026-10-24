<?php

namespace App\Command;

use App\Repository\OutboxEventRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Lists the outbox events the relay gave up on, for an operator. Shows the envelope fields
 * and the last error; never the payload.
 */
#[AsCommand(
    name: 'app:outbox:dead',
    description: 'Lists outbox events that failed every publish attempt.',
)]
final class ListDeadOutboxEventsCommand extends Command
{
    public function __construct(private readonly OutboxEventRepository $events)
    {
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
