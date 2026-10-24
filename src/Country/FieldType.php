<?php

namespace App\Country;

/**
 * The data type of a configurable field (architecture 16.2: "data type, validation").
 * A value is stored as JSON; accepts() is the validation every layer's value must pass.
 */
enum FieldType: string
{
    /** ISO 4217 code, three upper-case letters. */
    case CURRENCY = 'currency';
    /** A non-empty list of distinct ISO 4217 codes. */
    case CURRENCY_LIST = 'currency_list';
    /** BCP 47 tag, the contract's LanguageTag pattern. */
    case LANGUAGE_TAG = 'language_tag';
    /** An IANA time zone name PHP knows. */
    case TIMEZONE = 'timezone';
    case BOOLEAN = 'boolean';
    /** A whole number greater than zero. */
    case POSITIVE_INTEGER = 'positive_integer';

    public function accepts(mixed $value): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Reads a value typed by an operator: JSON (`10000000`, `true`, `["ZAR"]`, `"ZAR"`), or
     * a bare word, which is taken as a string. The result still has to pass accepts().
     */
    public function parse(string $text): mixed
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
