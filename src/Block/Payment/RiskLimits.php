<?php

namespace App\Block\Payment;

use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Config\PlatformSettings;
use App\Entity\ParticipantAction;
use App\Repository\PaymentRepository;
use Psr\Clock\ClockInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * The velocity limits on online payments (architecture 28.1; item 7 of the product owner's list
 * of 2026-10-24: start from defaults), checked before a checkout is started, on top of the
 * per-transaction maximum of the country's policy:
 *
 * - one payer (a member, or a guest session) may start or pay at most RISK_PAYER_DAILY_LIMIT_MINOR
 *   in 24 hours, and at most RISK_PAYER_HOURLY_COUNT payments in an hour;
 * - one creator may receive at most RISK_CREATOR_DAILY_LIMIT_MINOR in 24 hours.
 *
 * Defaults come from the environment; operators override them on the Platform settings page.
 * A limit of 0 is off. Open and confirmed payments count; failed and expired ones do not. A
 * refusal is TRANSACTION_LIMIT_EXCEEDED, which does not say which limit (the thresholds are
 * private, domain model 10.5), and is logged with the rule for operators.
 */
final readonly class RiskLimits
{
    public function __construct(
        private PaymentRepository $payments,
        private PlatformSettings $platform,
        private ClockInterface $clock,
        private LoggerInterface $logger,
        #[Autowire(env: 'int:RISK_PAYER_DAILY_LIMIT_MINOR')]
        private int $payerDailyLimit,
        #[Autowire(env: 'int:RISK_PAYER_HOURLY_COUNT')]
        private int $payerHourlyCount,
        #[Autowire(env: 'int:RISK_CREATOR_DAILY_LIMIT_MINOR')]
        private int $creatorDailyLimit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws ActionException TRANSACTION_LIMIT_EXCEEDED
     */
    public function check(ParticipantAction $action, int $amountMinor): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
