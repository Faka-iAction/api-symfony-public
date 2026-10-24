<?php

namespace App\Block\Action;

use App\Entity\ActionOption;
use App\Entity\PlaylistItem;

/**
 * One choice a participant can pick, whether it is an option of the Creator Action or an
 * item of the playlist it is limited to. The client does not need to know which.
 */
final readonly class PublicChoice
{
    public function __construct(
        public string $id,
        public string $label,
        public ?string $secondaryLabel,
        public bool $available,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function ofOption(ActionOption $option): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function ofItem(PlaylistItem $item): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
