<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;

/**
 * The contract's QrWithdrawRequest (alpha.4, withdrawOwnQrCode). The reasons are those of
 * the web page (App\Controller\Web\CreatorQrController::REASONS), in upper case.
 */
final readonly class WithdrawQrRequest implements RequestBody
{
    public const REASONS = ['MISUSED', 'LOST', 'OTHER'];

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
