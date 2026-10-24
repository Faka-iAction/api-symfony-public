<?php

namespace App\Api\Request;

use Symfony\Component\Validator\Constraint;

/**
 * A request body of the contract. RequestReader validates the decoded JSON against
 * constraint() and only then calls fromPayload().
 */
interface RequestBody
{
    /**
     * @param array<mixed> $payload the decoded JSON object, not validated yet; a body
     *                              with variants (oneOf) uses it to pick the variant
     */
    public static function constraint(array $payload): Constraint;

    /**
     * @param array<string, mixed> $payload valid against constraint()
     */
    public static function fromPayload(array $payload): static;
}
