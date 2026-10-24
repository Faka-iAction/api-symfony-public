<?php

namespace App\Block;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

final readonly class HealthBlock
{
    public const STATUS_OK = 'ok';

    public function __construct(
        #[Autowire('%app.version%')]
        private string $version,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Liveness only: it reports that the application answers and which version is running.
     * It deliberately says nothing about the database, queue or any other dependency,
     * because this result is shown on public endpoints.
     */
    public function check(): HealthStatus
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
