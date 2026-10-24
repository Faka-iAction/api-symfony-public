<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use App\Block\Action\PlaylistBlock;
use Symfony\Component\Validator\Constraint;

/**
 * The contract's UpdatePlaylistItemRequest. `artist` is nullable: null clears it.
 */
final readonly class UpdatePlaylistItemRequest implements RequestBody
{

    public static function constraint(array $payload): Constraint
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function fromPayload(array $payload): static
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
