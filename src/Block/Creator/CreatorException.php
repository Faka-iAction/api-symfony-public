<?php

namespace App\Block\Creator;

final class CreatorException extends \RuntimeException
{
    public function __construct(public readonly CreatorFailure $failure, ?\Throwable $previous = null)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
