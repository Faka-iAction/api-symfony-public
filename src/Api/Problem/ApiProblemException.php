<?php

namespace App\Api\Problem;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * Thrown by application code to answer an API request with a specific contract error.
 *
 * Unlike any other exception, its detail and field errors are sent to the client,
 * so they must be safe to show.
 */
final class ApiProblemException extends \RuntimeException implements HttpExceptionInterface
{
    /**
     * @param string|null           $detail  replaces the code's default text
     * @param list<FieldError>      $errors
     * @param array<string, string> $headers extra response headers, for example Retry-After
     */
    public function __construct(
        public readonly ErrorCode $errorCode,
        public readonly ?string $detail = null,
        public readonly array $errors = [],
        private readonly array $headers = [],
        ?\Throwable $previous = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatusCode(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, string>
     */
    public function getHeaders(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
