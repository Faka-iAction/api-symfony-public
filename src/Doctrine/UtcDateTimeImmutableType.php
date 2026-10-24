<?php

namespace App\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use Doctrine\DBAL\Types\Exception\InvalidFormat;

/**
 * A timestamp column that is always written and read in UTC.
 *
 * The stock Doctrine type writes a value in whatever time zone the object carries and
 * reads it back in the default time zone of PHP, so the stored instant would depend on
 * how the server is configured.
 */
final class UtcDateTimeImmutableType extends DateTimeImmutableType
{
    public const NAME = 'utc_datetime_immutable';

    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?\DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
