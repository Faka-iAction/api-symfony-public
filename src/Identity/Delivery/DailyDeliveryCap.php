<?php

namespace App\Identity\Delivery;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Clock\ClockInterface;
use App\Config\PlatformSettings;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * At most VERIFICATION_DELIVERY_DAILY_CAP codes per recipient per UTC day, so that a flood of
 * requests, each one waiting out the resend interval, cannot run up SMS costs or flood an
 * inbox. The per-identifier resend interval (VerificationBlock) stays the first gate.
 *
 * Checked in the worker, not in the request: a request that is over the cap gets exactly the
 * answer any other request gets, and the code is silently not sent.
 *
 * A recipient is counted by its keyed fingerprint (CodeSealer), so the cache never holds an
 * address. Retries of one message count once: the day's entry lists the verification IDs
 * already admitted. Two workers admitting at the same instant may both pass the last slot;
 * this is a cost guard, not an exact quota.
 */
final readonly class DailyDeliveryCap
{
    public function __construct(
        #[Autowire(service: 'cache.app')]
        private CacheItemPoolInterface $cache,
        private ClockInterface $clock,
        #[Autowire(env: 'int:VERIFICATION_DELIVERY_DAILY_CAP')]
        private int $limit,
        private ?PlatformSettings $platform = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Records the delivery and says whether it may go ahead.
     */
    public function admit(string $recipientFingerprint, string $verificationId): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
