<?php

namespace App\Block\Country;

/**
 * What the resolver found at one layer, and what it did with it. The list of steps is the
 * explanation that makes an effective value auditable (architecture 16.2).
 */
final readonly class ResolutionStep
{
    /** The layer supplied the value now in effect (it may be replaced by a later step). */
    public const USED = 'USED';
    /** The layer has nothing for this field, or does not apply to it. */
    public const NOT_SET = 'NOT_SET';
    /** The layer's value fails the field's validation and was not used. */
    public const INVALID = 'INVALID';
    /** The layer's value is not allowed here (an override of a field that is not overridable, or one that would weaken mandatory policy). */
    public const REFUSED = 'REFUSED';

    public function __construct(
        public ConfigLayer $layer,
        public string $outcome,
        public string $detail,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function describe(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
