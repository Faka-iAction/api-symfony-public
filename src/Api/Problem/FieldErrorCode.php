<?php

namespace App\Api\Problem;

/**
 * The field codes of the API contract (CONVENTIONS.md, section 8.3), sent in `errors[].code`.
 */
enum FieldErrorCode: string
{
    case REQUIRED = 'REQUIRED';
    case INVALID_FORMAT = 'INVALID_FORMAT';
    case INVALID_TYPE = 'INVALID_TYPE';
    case TOO_SHORT = 'TOO_SHORT';
    case TOO_LONG = 'TOO_LONG';
    case OUT_OF_RANGE = 'OUT_OF_RANGE';
    case UNKNOWN_VALUE = 'UNKNOWN_VALUE';
    case UNKNOWN_FIELD = 'UNKNOWN_FIELD';
    case NOT_AVAILABLE = 'NOT_AVAILABLE';
    case EMPTY_UPDATE = 'EMPTY_UPDATE';
    case NOT_ALLOWED = 'NOT_ALLOWED';
    case CURRENCY_MISMATCH = 'CURRENCY_MISMATCH';
    case BELOW_MINIMUM = 'BELOW_MINIMUM';
    case ABOVE_MAXIMUM = 'ABOVE_MAXIMUM';
    case NOT_IN_INCREMENT = 'NOT_IN_INCREMENT';
    case AMOUNT_MISMATCH = 'AMOUNT_MISMATCH';
}
