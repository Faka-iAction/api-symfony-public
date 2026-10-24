<?php

namespace App\Block\Country;

/**
 * The layers of architecture 16, most general first. The resolver considers them in this
 * order; a later layer that has a valid value replaces an earlier one, and the mandatory
 * policy constrains the override layer.
 */
enum ConfigLayer: string
{
    /** The field registry's global default (code). */
    case GLOBAL_DEFAULT = 'GLOBAL_DEFAULT';
    /** ZA's configuration, for another country, where the field inherits. */
    case BASE_COUNTRY = 'BASE_COUNTRY';
    /** The country's own configuration (`country_configurations`), or its `countries` row for the fields held there. */
    case COUNTRY = 'COUNTRY';
    /** An explicitly permitted creator override (`country_config_overrides`). */
    case CREATOR_OVERRIDE = 'CREATOR_OVERRIDE';
}
