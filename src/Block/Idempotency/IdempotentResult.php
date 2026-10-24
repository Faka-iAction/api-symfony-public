<?php

namespace App\Block\Idempotency;

final readonly class IdempotentResult
{
    /**
     * @param array<string, mixed> $body     the body, for reading fields from it
     * @param string               $json     the body as the JSON text to send: on a replay, byte for byte the
     *                                       text of the first answer
     * @param bool                 $replayed whether this is the stored result of an earlier request
     */
    public function __construct(
        public int $status,
        public array $body,
        public string $json,
        public bool $replayed,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
