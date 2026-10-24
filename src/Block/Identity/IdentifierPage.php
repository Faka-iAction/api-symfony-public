<?php

namespace App\Block\Identity;

use App\Entity\MemberIdentifier;

final readonly class IdentifierPage
{
    /**
     * @param list<MemberIdentifier> $items
     * @param string|null            $nextCursor null exactly when there is no further page
     */
    public function __construct(
        public array $items,
        public int $limit,
        public ?string $nextCursor,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
