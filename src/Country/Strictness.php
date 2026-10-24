<?php

namespace App\Country;

/**
 * Which way a field's value tightens policy. It is what lets the resolver tell whether a
 * more specific value (a creator override) narrows a mandatory policy or would weaken it
 * (architecture 16 and 30.2: lower layers may narrow, never weaken).
 */
enum Strictness: string
{
    /** No order: any value other than the policy's own would be a change, not a narrowing. */
    case NONE = 'none';
    /** A smaller number is stricter (a maximum amount, a maximum period). */
    case LOWER_IS_STRICTER = 'lower_is_stricter';
    /** false is stricter (a permission). */
    case FALSE_IS_STRICTER = 'false_is_stricter';
    /** A subset is stricter (a list of what is allowed). */
    case SUBSET_IS_STRICTER = 'subset_is_stricter';

    /**
     * Whether $candidate would weaken $policy. Both values have passed the field's type check.
     */
    public function weakens(mixed $policy, mixed $candidate): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
