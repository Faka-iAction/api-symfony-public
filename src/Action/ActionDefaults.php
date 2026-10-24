<?php

namespace App\Action;

/**
 * Every Creator Action and participation value that the contract and the product
 * decisions have not fixed, in one place. None of these is a decision: each is either the
 * contract's provisional value or a working default chosen here and reported as such.
 * The values that come from the environment (guest session lifetime, screening word list,
 * participation rate limit) are in .env.
 */
final class ActionDefaults
{
    /** CONVENTIONS.md item 56: lower-case letters, digits and hyphens, up to 60. Fixed at creation. */
    public const SLUG_MAX_LENGTH = 60;
    public const SLUG_PATTERN = '/^[a-z0-9]+(-[a-z0-9]+)*$/D';

    /** Contract schema limits. */
    public const TITLE_MAX_LENGTH = 120;
    public const DESCRIPTION_MAX_LENGTH = 2000;
    public const OPTION_LABEL_MAX_LENGTH = 200;
    public const PLAYLIST_NAME_MAX_LENGTH = 120;
    public const NOTE_MAX_LENGTH = 500;
    public const CUSTOM_FIELD_MAX_LENGTH = 500;
    public const CUSTOM_FIELD_LABEL_MAX_LENGTH = 120;
    public const MESSAGE_MAX_LENGTH = 2000;
    public const TIP_SUGGESTED_MAX = 6;
    public const REJECT_REASON_MAX_LENGTH = 255;
    public const SEARCH_TEXT_MAX_LENGTH = 100;

    /*
     * Country policy is not here. The supported currencies, the maximum amount, the maximum
     * fulfilment period and whether guests may take part are country configuration
     * (App\Country\ConfigFieldRegistry), resolved per creator country by
     * App\Block\Country\CountryBlock::actionPolicy(). Their provisional ZA values are seeded
     * by the country migration (App\Country\CountryDefaults).
     */

    /**
     * UNDECIDED platform policy (createCreatorAction: "a value outside policy is rejected with
     * OUT_OF_RANGE; the policy values are not part of this contract"). Placeholders. These are
     * product and anti-abuse bounds, the same in every country, so they stay constants.
     */
    public const POLICY_MAX_QUANTITY_LIMIT = 100_000;
    public const POLICY_MAX_VOTES_PER_PARTICIPANT = 100;
    public const POLICY_MAX_BIDS_PER_PARTICIPANT = 100;
    public const POLICY_MAX_DISPLAY_DURATION_SECONDS = 86_400;

    /**
     * UNDECIDED creation defaults for configuration fields a creator leaves out. The contract
     * gives a shape but no default. (Whether guests may take part starts at the country's
     * value: ActionConfig::defaultsFor().)
     */
    public const DEFAULT_DUPLICATE_SELECTIONS_ALLOWED = true;
    public const DEFAULT_VOTES_PER_PARTICIPANT = 1;
    public const DEFAULT_SHOUT_OUT_MESSAGE_MAX_LENGTH = 280;

    /**
     * UNDECIDED: approval is required by default on the types with an acceptance step
     * (Request, Shout-out, Bid), and never on a Vote or a Tip, which have none.
     */
    public static function defaultApprovalRequired(string $type): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
