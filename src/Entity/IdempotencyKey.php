<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\IdempotencyKeyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * The stored result of a request that carried an `Idempotency-Key`, so that a retry gets
 * the same answer (domain model 12.3; CONVENTIONS.md, section 9).
 *
 * The unique scope and key make claiming a key atomic: of two requests that arrive
 * together, only one can insert the row.
 */
#[ORM\Entity(repositoryClass: IdempotencyKeyRepository::class)]
#[ORM\Table(name: 'idempotency_keys')]
#[ORM\UniqueConstraint(name: 'uniq_idempotency_keys_scope_key', columns: ['scope', 'idempotency_key'])]
#[ORM\Index(name: 'idx_idempotency_keys_expires_at', columns: ['expires_at'])]
class IdempotencyKey
{
    public const STATUS_IN_PROGRESS = 'IN_PROGRESS';
    public const STATUS_COMPLETED = 'COMPLETED';

    public function __construct(string $scope, string $idempotencyKey, string $requestHash, \DateTimeImmutable $now, \DateTimeImmutable $expiresAt)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getScope(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getIdempotencyKey(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getRequestHash(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isCompleted(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getResponseStatus(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The JSON text of the response body, byte for byte as it was first sent.
     */
    public function getResponseBody(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getExpiresAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $responseBody the JSON text of the response body, as it is sent
     */
    public function complete(int $responseStatus, string $responseBody, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
