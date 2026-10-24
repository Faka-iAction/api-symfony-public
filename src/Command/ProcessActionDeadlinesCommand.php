<?php

namespace App\Command;

use App\Block\Action\ActionDeadlineBlock;
use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Applies what time has done: Creator Actions whose start time is reached become ACTIVE,
 * those whose end time has passed become EXPIRED (completing their votes), and participant
 * Actions still unfulfilled at their fulfilment deadline become EXPIRED (decision 24).
 * A free Action that expires has no payment effect.
 *
 * Safe to run as often as wanted, for example every minute from cron: a second run finds
 * nothing left to do.
 *
 * Each change writes its own state history row and event in its own transaction. A run
 * that changed anything is also summarised in the audit log, with the command as actor;
 * a run that found nothing to do writes nothing there.
 */
#[AsCommand(
    name: self::NAME,
    description: 'Activates and expires Creator Actions by their times and expires participant Actions past their fulfilment deadline.',
)]
final class ProcessActionDeadlinesCommand extends Command
{
    public const NAME = 'app:actions:process-deadlines';

    public function __construct(
        private readonly ActionDeadlineBlock $deadlines,
        private readonly AuditLogBlock $audit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
