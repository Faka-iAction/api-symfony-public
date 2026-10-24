<?php

namespace App\Block\Audit;

/**
 * What an admin asks of the audit log: entries about one target, by one actor, of one
 * action, within a time range. Every part is optional; the times are UTC, `from` inclusive
 * and `until` exclusive.
 */
final readonly class AuditLogFilter
{
    public function __construct(
        public ?string $targetType = null,
        public ?string $targetId = null,
        /** A member's or guest session's public ID, or a console command's name. */
        public ?string $actor = null,
        public ?string $action = null,
        public ?\DateTimeImmutable $from = null,
        public ?\DateTimeImmutable $until = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The filters as they are recorded in the "audit log viewed" entry: only those given.
     *
     * @return array<string, string>
     */
    public function toRecord(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
