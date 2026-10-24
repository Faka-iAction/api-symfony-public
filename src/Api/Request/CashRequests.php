<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Limits shared by the cash request bodies (contract CashReceipt.note and correctionReason).
 */
final class CashRequests
{
    public const TEXT_MAX_LENGTH = 255;

    /**
     * Money whose amount may be zero (a correction to "no cash was received").
     *
     * @return list<Constraint>
     */
    public static function moneyFromZero(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
