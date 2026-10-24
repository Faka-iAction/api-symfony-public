<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Payment\PaymentState;
use App\Repository\PaymentRefundRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * The automatic refund of one payment (architecture 8.1 and 14.1; TIS 8.2.2 and 9.6).
 *
 * - One per payment, under a unique key: whichever trigger asks first (rejection, deadline,
 *   disable, late confirmation) creates it, and every later ask finds it. That is what makes
 *   the refund exactly once.
 * - Always for the full amount of the payment (decision 8); there is no amount to choose.
 * - `status`: REQUESTED (waiting to be sent), SENDING (a worker holds it), SUBMITTED (the
 *   provider accepted it), SUCCEEDED, FAILED (the provider could not complete it: an operator
 *   follows up), or UNKNOWN (the request may or may not have reached the provider: it is
 *   reconciled by asking the provider and is never sent again on its own).
 * - The delivery columns (attempts, next_attempt_at, the claim) are the worker's, as in the
 *   outbox.
 */
#[ORM\Entity(repositoryClass: PaymentRefundRepository::class)]
#[ORM\Table(name: 'payment_refunds')]
#[ORM\UniqueConstraint(name: 'uniq_payment_refunds_payment', columns: ['payment_id'])]
#[ORM\Index(name: 'idx_payment_refunds_status_next', columns: ['status', 'next_attempt_at'])]
class PaymentRefund
{

    public function __construct(Payment $payment, string $reason, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayment(): Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReason(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The status the contract shows (RefundStatus): the internal SENDING and UNKNOWN read as in progress. */
    public function getPublicStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAmountMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProviderRefundId(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAttempts(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getNextAttemptAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLastError(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRequestedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSubmittedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSucceededAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFailedAt(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markSubmitted(?string $providerRefundId, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markSucceeded(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markFailed(string $error, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function markUnknown(string $error, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** A definite refusal: nothing was created at the provider, so it is sent again later. */
    public function retryLater(string $error, \DateTimeImmutable $now, \DateTimeImmutable $next): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isFinal(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getClaimToken(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getClaimedUntil(): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
