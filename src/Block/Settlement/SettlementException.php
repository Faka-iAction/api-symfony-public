<?php

namespace App\Block\Settlement;

final class SettlementException extends \RuntimeException
{
    public function __construct(public readonly SettlementFailure $failure, ?\Throwable $previous = null)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
