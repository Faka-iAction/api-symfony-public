<?php

namespace App\Block\Idempotency;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * How long idempotency keys are kept (CONVENTIONS.md section 14, item 35). Not decided:
 * the defaults in .env are placeholders.
 */
final readonly class IdempotencySettings
{
    /**
     * @param int $retention        seconds a completed key is remembered
     * @param int $inProgressTimeout seconds after which a key whose request never finished is
     *                               taken to be abandoned (the process died) and may be used again
     */
    public function __construct(
        #[Autowire(env: 'int:IDEMPOTENCY_KEY_RETENTION')]
        public int $retention,
        #[Autowire(env: 'int:IDEMPOTENCY_IN_PROGRESS_TIMEOUT')]
        public int $inProgressTimeout,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
