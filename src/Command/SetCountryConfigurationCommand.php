<?php

namespace App\Command;

use App\Block\Audit\AuditActor;
use App\Block\Country\CountryConfigResolver;
use App\Block\Country\CountryConfigurationBlock;
use App\Block\Country\CountryPolicyException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Adds or changes one country configuration value: the next version of the field for the
 * country, validated against the field registry, written with an audit entry and a
 * CountryConfigurationUpdated event (a proposed name) in one transaction. Earlier versions
 * are kept. The three fields held on the country record are refused here.
 *
 * The value is JSON (`5000000`, `false`, `["ZAR"]`); a bare word is taken as a string.
 */
#[AsCommand(
    name: self::NAME,
    description: 'Adds the next version of a country configuration value (validated, audited, with an event).',
)]
final class SetCountryConfigurationCommand extends Command
{
    public const NAME = 'app:country:config:set';

    public function __construct(
        private readonly CountryConfigurationBlock $configuration,
        private readonly CountryConfigResolver $resolver,
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
