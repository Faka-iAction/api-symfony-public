<?php

namespace App\Outbox;

/**
 * What one relay run did.
 */
final readonly class RelayReport
{
    public function __construct(
        /** Handed to Messenger and marked PUBLISHED. */
        public int $published = 0,
        /** Failed and left PENDING for a later attempt. */
        public int $retried = 0,
        /** Failed for the last allowed time and marked DEAD. */
        public int $dead = 0,
        /** Handed to Messenger, but the lease had expired and another worker had the row: it may be published twice. */
        public int $leaseLost = 0,
        /** Batches read. */
        public int $batches = 0,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function add(self $other): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function handled(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
