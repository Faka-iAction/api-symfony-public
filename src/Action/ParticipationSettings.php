<?php

namespace App\Action;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * The participation values that come from the environment (.env holds the defaults).
 */
final readonly class ParticipationSettings
{
    /**
     * @param int $guestSessionTtl seconds a guest session lasts after it is created or last
     *                             used. Decision 23: 30 days, renewed on use. Configuration,
     *                             as the contract requires (CONVENTIONS.md, section 4).
     */
    public function __construct(
        #[Autowire(env: 'int:GUEST_SESSION_TTL')]
        public int $guestSessionTtl,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
