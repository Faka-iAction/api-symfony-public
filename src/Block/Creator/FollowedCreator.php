<?php

namespace App\Block\Creator;

final readonly class FollowedCreator
{
    public function __construct(
        public CreatorView $creator,
        public \DateTimeImmutable $followedAt,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
