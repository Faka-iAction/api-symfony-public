<?php

namespace App\Block\Action;

use App\Action\ActionConfig;
use App\Action\ActionDefaults;
use App\Action\ActionType;
use App\Action\Money;
use App\Block\Country\ActionPolicy;

/**
 * The rules a Creator Action's configuration must satisfy (createCreatorAction,
 * updateOwnCreatorAction and publishCreatorAction; state-machines.md 2.2).
 *
 * - violations(): a field that does not apply to the type, a value outside policy, mixed
 *   currencies. Always checked, on the merged configuration: 422.
 * - publishProblems(): what a live configuration must have. Checked on publish, and on
 *   every update of a Creator Action that is no longer a draft: 409 NOT_PUBLISHABLE.
 *
 * Field names are those of the request body, under `config.`.
 */
final class ConfigRules
{

    /**
     * @param ActionPolicy $policy the country policy of the creator's country (CountryBlock::actionPolicy()):
     *                             supported currencies, the maximum amount, the maximum fulfilment
     *                             period and whether guests may take part
     *
     * @return list<array{string, string}>
     */
    public static function violations(string $type, ActionConfig $config, ActionPolicy $policy): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * What a live configuration must have (state-machines.md 2.2, DRAFT to PUBLISHED).
     *
     * Decision 24 gives free Actions a fulfilment deadline under the same rule as paid
     * ones, so a free Request or Shout-out needs a deadline rule too.
     *
     * @param bool $endsAtMustBeAhead true on publish and when an update sets the end time
     *
     * @return list<array{string, string}>
     */
    public static function publishProblems(string $type, ActionConfig $config, ?\DateTimeImmutable $endsAt, \DateTimeImmutable $now, bool $endsAtMustBeAhead): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
