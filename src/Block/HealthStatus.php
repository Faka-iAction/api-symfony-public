<?php

namespace App\Block;

final readonly class HealthStatus
{
    public function __construct(
        public string $status,
        public string $version,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
