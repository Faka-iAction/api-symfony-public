<?php

namespace App\Block\Creator;

final readonly class PublicCreator
{
    /**
     * @param string|null $redirectedFrom the former handle that was asked for; null when it was the current one
     */
    public function __construct(
        public CreatorView $view,
        public ?string $redirectedFrom,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
