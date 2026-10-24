<?php

namespace App\Command;

use App\Block\Country\CountryConfigResolver;
use App\Block\Country\CountryPolicyException;
use App\Repository\CountryRepository;
use Psr\Clock\ClockInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Read-only: the effective configuration of a country at a moment, each field with the
 * layer that supplied it and how it was reached (architecture 16.2: explainable). A field
 * whose mandatory policy is missing or invalid is shown as REFUSED, with the reason; the
 * command then exits with a failure status, so a check run before activating a country
 * fails while its policy is incomplete.
 */
#[AsCommand(
    name: self::NAME,
    description: 'Shows the effective configuration of a country and where each value comes from.',
)]
final class ShowCountryConfigurationCommand extends Command
{
    public const NAME = 'app:country:config:show';

    public function __construct(
        private readonly CountryConfigResolver $resolver,
        private readonly CountryRepository $countries,
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
