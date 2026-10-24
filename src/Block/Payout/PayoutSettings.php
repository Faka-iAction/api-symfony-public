<?php

namespace App\Block\Payout;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * The settlement and payout values that are deployment configuration (decisions 26 and 27;
 * architecture 13.5: the cool-off is mandatory, only its length is configurable). Every
 * value is a placeholder until decided; see .env.
 *
 * - PAYOUTS_LIVE_APPROVED: the legal gate of decision 26. Off by default. With a live
 *   provider key, no transfer, transfer recipient or balance request is made unless it is
 *   on. It is deployment configuration on purpose: no admin page and no command changes it.
 * - PAYOUTS_COOL_OFF_SECONDS: how long after its confirmation a payment stays in the cool-off.
 * - PAYOUTS_MINIMUM_MINOR: the smallest payable amount that is paid out (in minor units).
 * - PAYOUTS_TRANSFER_FEE_MINOR, PAYOUTS_FEE_BORNE_BY_CREATOR: the provider's fee for one
 *   transfer, as configured, and who bears it.
 * - SETTLEMENT_STEP_UP_MAX_AGE: how recent the sign-in must be to give or change payout details.
 * - SETTLEMENT_CHANGE_HOLD_SECONDS: how long payouts stay on hold after the details change.
 * - SETTLEMENT_ACCOUNT_VALIDATION: whether Paystack's Validate Account (South Africa; needs an identity or registration number) is used when the
 *   creator supplies the document details. Off: every new destination waits for manual review.
 *
 * Not final: the tests change single values (tests/Support/AdjustablePayoutSettings).
 */
class PayoutSettings
{
    public function __construct(
        #[Autowire(env: 'bool:PAYOUTS_LIVE_APPROVED')]
        private readonly bool $liveApproved,
        #[Autowire(env: 'int:PAYOUTS_COOL_OFF_SECONDS')]
        private readonly int $coolOffSeconds,
        #[Autowire(env: 'int:PAYOUTS_MINIMUM_MINOR')]
        private readonly int $minimumMinor,
        #[Autowire(env: 'int:PAYOUTS_TRANSFER_FEE_MINOR')]
        private readonly int $transferFeeMinor,
        #[Autowire(env: 'bool:PAYOUTS_FEE_BORNE_BY_CREATOR')]
        private readonly bool $feeBorneByCreator,
        #[Autowire(env: 'int:SETTLEMENT_STEP_UP_MAX_AGE')]
        private readonly int $stepUpMaxAge,
        #[Autowire(env: 'int:SETTLEMENT_CHANGE_HOLD_SECONDS')]
        private readonly int $changeHoldSeconds,
        #[Autowire(env: 'bool:SETTLEMENT_ACCOUNT_VALIDATION')]
        private readonly bool $accountValidation,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function liveApproved(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function coolOffSeconds(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function minimumMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function transferFeeMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function feeBorneByCreator(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function stepUpMaxAge(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function changeHoldSeconds(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function accountValidation(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
