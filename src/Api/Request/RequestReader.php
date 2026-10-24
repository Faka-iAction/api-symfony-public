<?php

namespace App\Api\Request;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Reads what a client sent and refuses whatever the contract does not allow, with the
 * contract's errors (CONVENTIONS.md, sections 1, 7 and 8.2).
 */
final readonly class RequestReader
{

    public function __construct(private ValidatorInterface $validator)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @template T of RequestBody
     *
     * @param class-string<T> $type
     *
     * @return T
     *
     * @throws ApiProblemException BAD_REQUEST when the body is not valid JSON or not a JSON object,
     *                             VALIDATION_FAILED when a field breaks a rule, including a field of
     *                             the wrong JSON type
     */
    public function body(Request $request, string $type): RequestBody
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Refuses any query parameter the operation does not list, so that a misspelt one
     * is not silently ignored.
     *
     * @param list<string> $allowed
     *
     * @throws ApiProblemException INVALID_PARAMETER
     */
    public function allowQuery(Request $request, array $allowed = []): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The filters of a list operation, each validated with its constraints. A filter that
     * is not sent is null. Every problem is a 400 (section 7): the problem is in the URL.
     *
     * @param array<string, list<Constraint>> $filters by parameter name
     *
     * @return array<string, string|null>
     *
     * @throws ApiProblemException INVALID_PARAMETER
     */
    public function filters(Request $request, array $filters): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The optional `Idempotency-Key` header (CONVENTIONS.md, section 9).
     *
     * @throws ApiProblemException INVALID_PARAMETER when it is present but malformed
     */
    public function idempotencyKey(Request $request): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The `Idempotency-Key` header of an operation that requires it (CONVENTIONS.md, section 9).
     *
     * @throws ApiProblemException IDEMPOTENCY_KEY_REQUIRED when it is missing or malformed
     */
    public function requiredIdempotencyKey(Request $request): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Identifies a request in substance: method, path and body, where the body's
     * whitespace and key order make no difference. Call it after body() has accepted the body.
     */
    public function fingerprint(Request $request): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The `limit` and `cursor` of a paginated operation. The limit is never clamped.
     *
     * @return array{int, string|null}
     *
     * @throws ApiProblemException INVALID_PARAMETER or INVALID_CURSOR
     */
    public function page(Request $request): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
