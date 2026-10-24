<?php

namespace App\Block\Country;

use App\Country\ConfigField;

/**
 * The effective value of one field for one country at one moment, with the layer that
 * supplied it and every step that led there.
 */
final readonly class ResolvedValue
{
    /**
     * @param list<ResolutionStep> $steps in the order the layers were considered
     */
    public function __construct(
        public ConfigField $field,
        public string $countryCode,
        public \DateTimeImmutable $at,
        public mixed $value,
        public ConfigLayer $layer,
        public string $source,
        public array $steps,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<string>
     */
    public function explanation(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
