<?php

namespace App\Block\Country;

use App\Country\ConfigFieldRegistry;
use App\Entity\Country;
use App\Entity\CreatorProfile;
use App\Repository\CountryRepository;

/**
 * What the other Blocks ask of country configuration: whether a country may take
 * something new, and the policy a Creator Action is held to.
 */
final readonly class CountryBlock
{
    public function __construct(
        private CountryRepository $countries,
        private CountryConfigResolver $resolver,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * For anything new made in a country: a creator profile, a Creator Action, a
     * participation. Records already made in an INACTIVE country are not refused here;
     * they never call this.
     *
     * @throws CountryPolicyException UNKNOWN_COUNTRY or COUNTRY_INACTIVE
     */
    public function requireActive(string $countryCode): Country
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isActive(string $countryCode): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The policy for the creator's Creator Actions at a moment, with the creator's
     * permitted overrides. Works for a creator in an INACTIVE country, whose existing
     * Creator Actions keep working.
     *
     * @throws CountryPolicyException UNKNOWN_COUNTRY, POLICY_MISSING or POLICY_INVALID: fail safe, nothing may go ahead
     */
    public function actionPolicy(CreatorProfile $profile, \DateTimeImmutable $at): ActionPolicy
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
