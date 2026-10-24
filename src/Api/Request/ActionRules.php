<?php

namespace App\Api\Request;

use App\Action\ActionDefaults;
use App\Action\ActionType;
use App\Action\Money;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Constraints and conversions for the Creator Action and participation request bodies,
 * from the contract's schemas (Money, Timestamp, CreatorActionConfigInput, ...).
 */
final class ActionRules
{
    /** Timestamp: UTC with the Z suffix; a local offset is INVALID_FORMAT (CONVENTIONS.md 5). */
    public const TIMESTAMP_PATTERN = '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(\.\d{1,6})?Z$/D';
    public const CURRENCY_PATTERN = '/^[A-Z]{3}$/D';

    /**
     * @return list<Constraint>
     */
    public static function integer(int $min = 1, int $max = self::INT32_MAX): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function boolean(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A field whose schema is `const: true` (bidTermsAcknowledged, cashTermsAcknowledged): a
     * boolean, and only `true` is accepted. The contract names no field code for `false`;
     * REQUIRED is used, since the acknowledgement is what is missing.
     *
     * @return list<Constraint>
     */
    public static function acknowledged(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function money(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function timestamp(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function slug(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The contract's CreatorActionConfigInput: every field optional, closed.
     *
     * @return list<Constraint>
     */
    public static function configInput(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<mixed> $config valid against configInput()
     *
     * @return array<string, mixed> amounts as Money, the rest as sent
     */
    public static function config(array $config): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function toMoney(mixed $value): Money
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A valid contract Timestamp as a UTC instant, whole seconds, or null when it names no real instant.
     */
    public static function toTime(string $value): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function toTimeOrNull(mixed $value): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
