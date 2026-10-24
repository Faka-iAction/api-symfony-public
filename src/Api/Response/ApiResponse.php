<?php

namespace App\Api\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Builds the successful responses of the API.
 */
final class ApiResponse
{
    /**
     * @param array<string, mixed> $body
     * @param bool                 $noStore for a response that carries tokens, a code challenge or sign-in
     *                                      identifiers (CONVENTIONS.md, section 12.1)
     */
    public static function json(array $body, int $status = Response::HTTP_OK, bool $noStore = false): JsonResponse
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A response whose body is JSON text already encoded, sent as it is: for the answer of
     * an idempotent request, which is the same bytes each time (IdempotencyBlock).
     *
     * @param bool $noStore as for json()
     */
    public static function fromJson(string $json, int $status = Response::HTTP_OK, bool $noStore = false): JsonResponse
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function noContent(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
