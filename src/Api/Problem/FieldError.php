<?php

namespace App\Api\Problem;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * One entry of the envelope's `errors` array.
 */
final class FieldError
{
    /** The `field` that names the request body as a whole, for a problem of no single field. */
    public const BODY = '$';

    /**
     * @param string      $field  dot notation for nested fields, brackets for array items
     * @param string|null $detail must be safe to show and must never echo the rejected value
     */
    public function __construct(
        public readonly string $field,
        public readonly FieldErrorCode $code,
        public readonly ?string $detail = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The violation message is dropped on purpose: it can echo the rejected value.
     *
     * @return list<self>
     */
    public static function fromViolations(ConstraintViolationListInterface $violations): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A constraint that carries this payload key decides its own field code.
     *
     * @return array{fieldCode: FieldErrorCode}
     */
    public static function payload(FieldErrorCode $code): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{field: string, code: string, detail?: string}
     */
    public function toArray(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
