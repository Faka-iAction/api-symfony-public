<?php

namespace App\Payment\Provider;

use App\Block\Payment\PaymentGatewayBlock;
use App\Entity\PaymentGateway;
use Psr\Log\LoggerInterface;

/**
 * Paystack's keys, from the gateway account operators configure in the admin (ADR-040;
 * PaymentGatewayBlock), never from the environment. Without an active account with both keys
 * every payment operation fails closed with PAYMENT_PROVIDER_UNAVAILABLE.
 *
 * Collections are sandbox only (decision 25 and TIS 9.7: no provider is called live until
 * live activation is approved). A key of
 * Paystack's live mode is refused for collections as if no key were set, and the refusal is
 * logged (isConfigured(), secretKey()). Lifting this is a deliberate code change, not a
 * configuration change, and decision 26 did not lift it.
 *
 * Payouts (decision 26) have a gate of their own, the legal gate: payoutSecretKey() gives a
 * test key always, and a live key only when the deployment says live payouts are approved
 * (PAYOUTS_LIVE_APPROVED, App\Block\Payout\PayoutSettings). It never makes a live key usable
 * for collections.
 *
 * Not final: the tests switch the keys off, or to a placeholder live key, to prove the
 * fail-closed paths.
 */
class PaystackCredentials
{

    public function __construct(
        private readonly ?PaymentGatewayBlock $gateways = null,
        private readonly ?LoggerInterface $logger = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Whether collections may use the keys: both keys set, and neither of them live. */
    public function isConfigured(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Whether both keys are set, test or live. */
    public function hasKeys(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** Whether either key is one of Paystack's live mode. */
    public function isLive(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The key for collections.
     *
     * @throws ProviderNotConfigured
     */
    public function secretKey(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The key for payouts (transfer recipients, transfers, the balance) and for checking the
     * signature of their notifications.
     *
     * @param bool $liveApproved the legal gate: whether live payouts are approved for this deployment
     *
     * @throws ProviderNotConfigured no key is set
     * @throws PayoutsNotApproved    the key is live and the legal gate is closed: nothing may be sent
     */
    public function payoutSecretKey(bool $liveApproved): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function secret(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function publicKeyValue(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
