<?php

namespace App\Block\Country;

/**
 * Why country configuration could not be resolved or changed. Resolution failures are
 * fail-safe refusals: the operation that needed the value does not go ahead.
 */
enum CountryPolicyFailure
{
    /** No `countries` row has the code. */
    case UNKNOWN_COUNTRY;
    /** The country exists but is not ACTIVE, and the operation would make something new in it. */
    case COUNTRY_INACTIVE;
    /** Mandatory policy has no value for the country at that moment. */
    case POLICY_MISSING;
    /** A value in effect fails the field's validation, or two values contradict each other. */
    case POLICY_INVALID;
    /** The key is not in the field registry. */
    case UNKNOWN_FIELD;
    /** A value given for a change fails the field's validation. */
    case INVALID_VALUE;
    /** The field is held on the country record, not in `country_configurations`. */
    case FIELD_ON_COUNTRY_RECORD;
    /** An override of a field that is not marked overridable. */
    case OVERRIDE_NOT_PERMITTED;
    /** An override that would relax mandatory policy. */
    case OVERRIDE_WEAKENS_POLICY;
}
