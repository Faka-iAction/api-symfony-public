<?php

namespace App\Block\Action;

final class ActionException extends \RuntimeException
{
    /**
     * @param list<array{string, string}> $fields pairs of contract field name (dot notation) and contract field code
     */
    public function __construct(
        public readonly ActionFailure $failure,
        public readonly array $fields = [],
        ?\Throwable $previous = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function field(ActionFailure $failure, string $field, string $code): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
