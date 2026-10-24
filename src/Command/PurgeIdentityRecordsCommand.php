<?php

namespace App\Command;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Identity\IdentityPurgeBlock;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Removes expired one-time code challenges and expired or revoked API sessions older than
 * the retention. Safe to run as often as wanted, for example from cron.
 *
 * A run that deleted anything is summarised in the audit log (counts and retention only),
 * with the command as actor.
 */
#[AsCommand(
    name: self::NAME,
    description: 'Deletes expired verification challenges and expired or revoked sessions older than the retention.',
)]
final class PurgeIdentityRecordsCommand extends Command
{
    public const NAME = 'app:identity:purge';

    public function __construct(
        private readonly IdentityPurgeBlock $purge,
        private readonly AuditLogBlock $audit,
        #[Autowire(env: 'int:AUTH_PURGE_RETENTION')]
        private readonly int $defaultRetention,
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
