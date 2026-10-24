<?php

namespace App\Command;

use App\Outbox\OutboxRelay;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Publishes the due outbox events to the Messenger transport and marks them published
 * (OutboxRelay). Safe to run as several processes at once, and as often as wanted, for
 * example every few seconds from a supervisor or every minute from cron: rows are leased
 * one at a time, so no row is published by two runs.
 *
 * Delivery is at least once: an event can be published again after a crash between the
 * dispatch and the mark. Consumers deduplicate by eventId.
 *
 * Not audited: it changes only the delivery columns of the outbox, never business data.
 */
#[AsCommand(
    name: 'app:outbox:relay',
    description: 'Publishes pending outbox events as Messenger messages, oldest first, and marks them published.',
)]
final class RelayOutboxCommand extends Command
{
    public function __construct(private readonly OutboxRelay $relay)
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
