<?php

namespace App\Block\Action;

/**
 * Everything a creator gives to create a Creator Action. Validated for shape by the entry point.
 */
final readonly class CreatorActionInput
{
    /**
     * @param array<string, mixed> $config contract field name => value; amounts as Money, `playlistId`
     *                                     as the playlist's public identifier
     */
    public function __construct(
        public string $type,
        public string $slug,
        public string $title,
        public ?string $description,
        public ?\DateTimeImmutable $startsAt,
        public ?\DateTimeImmutable $endsAt,
        public array $config,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
