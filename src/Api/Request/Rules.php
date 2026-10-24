<?php

namespace App\Api\Request;

use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Creator\CreatorDefaults;
use App\Creator\LanguageTag;
use App\Identity\Social\SocialCredentialType;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Building blocks for the constraints of a request body, written against the decoded
 * JSON rather than against an object, because only the raw payload shows an unknown
 * field or the difference between an absent field and one sent as null.
 *
 * The patterns and limits are those of the contract's schemas (faka-v1.yaml).
 */
final class Rules
{
    public const ID_PATTERN = '/^[A-Za-z0-9_\-]{1,64}$/D';
    public const COUNTRY_PATTERN = '/^[A-Z]{2}$/D';
    public const LANGUAGE_PATTERN = '/^[A-Za-z]{2,3}(-[A-Za-z0-9]{2,8})*$/D';
    public const VERIFICATION_CODE_PATTERN = '/^[A-Za-z0-9]{4,10}$/D';
    public const E164_PATTERN = '/^\+[1-9][0-9]{6,14}$/D';

    public const IDENTIFIER_EMAIL = 'email';
    public const IDENTIFIER_PHONE = 'phone';

    /**
     * A closed JSON object: a value that is not a JSON object is an INVALID_TYPE, and a
     * field that is not listed is an UNKNOWN_FIELD.
     *
     * @param array<string, Constraint> $fields each made by required(), optional() or nullable()
     */
    public static function object(array $fields): Assert\Sequentially
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether a value read by RequestReader was a JSON object. A non-empty object is an
     * array with string keys; an empty one is an \ArrayObject, so that it is not taken for
     * an empty JSON array, which is a PHP array too.
     */
    public static function isJsonObject(mixed $value): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The field must be present and not null.
     *
     * @param list<Constraint> $constraints
     */
    public static function required(array $constraints): Assert\Required
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The field may be absent. Sent as null it has the wrong type: only a field the
     * schema declares nullable accepts null.
     *
     * @param list<Constraint> $constraints
     */
    public static function optional(array $constraints): Assert\Optional
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The field may be absent or null.
     *
     * @param list<Constraint> $constraints
     */
    public static function nullable(array $constraints): Assert\Optional
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param int<0, max> $min
     * @param int<1, max> $max
     *
     * @return list<Constraint>
     */
    public static function string(int $min, int $max, ?string $pattern = null): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<string> $values
     *
     * @return list<Constraint>
     */
    public static function oneOf(array $values): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A string that only has to match a pattern. The Regex constraint accepts an empty
     * string whatever the pattern says, so that case is refused first.
     *
     * @return list<Constraint>
     */
    public static function pattern(string $pattern): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function id(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function verificationCode(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function displayName(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function country(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function locale(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The contract's SignInIdentifier: the shape first, then the format that goes with
     * the type, which the shape alone cannot express.
     *
     * @return list<Constraint>
     */
    public static function signInIdentifier(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The contract's EmailIdentifier, used by the password grant. A phone identifier is a
     * known type that this request does not allow (CONVENTIONS.md, section 12.2), so it is
     * NOT_ALLOWED on `type` and its value is not checked further.
     *
     * @return list<Constraint>
     */
    public static function emailIdentifier(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The contract's Handle. Upper case is refused, not lowered: the schema's pattern is lower case.
     *
     * @return list<Constraint>
     */
    public static function handle(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The contract's CategoryCode. Whether the code exists is the Block's question.
     *
     * @return list<Constraint>
     */
    public static function category(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function creatorDisplayName(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function bio(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<Constraint>
     */
    public static function city(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An array of LanguageTag with no repeats. Tags are compared in their canonical case,
     * so `en` and `EN` are a repeat; the repeat is NOT_ALLOWED, the catalogue having no
     * code of its own for it.
     *
     * @return list<Constraint>
     */
    public static function languages(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * An array of the contract's CreatorLink.
     *
     * @return list<Constraint>
     */
    public static function links(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The contract's SocialCredential.
     *
     * @return list<Constraint>
     */
    public static function socialCredential(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
