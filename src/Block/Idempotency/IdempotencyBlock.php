<?php

namespace App\Block\Idempotency;

use App\Entity\IdempotencyKey;
use App\Repository\IdempotencyKeyRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;

/**
 * Runs a state-changing action at most once per idempotency key (CONVENTIONS.md, section 9).
 *
 * - Same key, same request: the stored result is returned and nothing is done again.
 * - Same key, different request: refused (KEY_REUSED), nothing is done.
 * - Same key while the first request still runs: refused (REQUEST_IN_PROGRESS).
 *
 * The result is stored in the same transaction as the action's own changes. An action
 * that fails, with a refusal or an error, records nothing: the key is released and a
 * retry is processed again. For a refusal that gives the same answer again unless the
 * state has changed in between, but not a stored copy of the first one.
 *
 * The body is stored as the JSON text that is sent, and a replay answers with that text
 * unchanged: the same bytes, not merely the same data. The text is never decoded and
 * encoded again on the way back, and the column that holds it is text, not JSON, which
 * MySQL would normalise (object keys sorted, spacing changed).
 */
final readonly class IdempotencyBlock
{
    /**
     * How a body is encoded: the encoding of Symfony's JsonResponse, which ApiResponse::json()
     * uses, so a request with an idempotency key is answered with the same text as one without.
     */
    public const JSON_ENCODING = \JSON_HEX_TAG | \JSON_HEX_APOS | \JSON_HEX_AMP | \JSON_HEX_QUOT | \JSON_THROW_ON_ERROR;

    public function __construct(
        private IdempotencyKeyRepository $keys,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private IdempotencySettings $settings,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string                                         $scope       the caller and the operation; a key means nothing outside it
     * @param string                                         $requestHash identifies the request in substance
     * @param callable(): array{int, array<string, mixed>} $action      does the work and returns the status and body to answer with
     *
     * @throws IdempotencyException KEY_REUSED or REQUEST_IN_PROGRESS
     */
    public function run(string $scope, string $key, string $requestHash, callable $action): IdempotentResult
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
