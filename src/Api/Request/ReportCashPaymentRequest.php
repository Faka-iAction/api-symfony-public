<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;

/**
 * The contract's ReportCashPaymentRequest. `cashTermsAcknowledged` must be true: the
 * participant was told that cash is paid directly to the creator and that FAKA does not
 * collect it (architecture 12.5.3.1, criterion 2).
 */
final readonly class ReportCashPaymentRequest implements RequestBody
{

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
