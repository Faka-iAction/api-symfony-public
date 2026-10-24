<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\CountryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A country the platform knows, and whether it is activated (domain model 8.1;
 * architecture 16). ZA is the MVP1 base country.
 *
 * INACTIVE stops new use only: no new creator profile, Creator Action or participation in
 * it. Records already made in it keep working, and deactivating removes nothing and no
 * obligation (architecture 16). There is no delete.
 *
 * The default currency, locale and time zone are the country's values of the
 * configuration fields currency.default, localization.default_locale and
 * localization.timezone (App\Country\ConfigFieldRegistry).
 */
#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\Table(name: 'countries')]
#[ORM\UniqueConstraint(name: 'uniq_countries_code', columns: ['code'])]
#[ORM\Index(name: 'idx_countries_default_language', columns: ['default_language_id'])]
class Country
{
    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_INACTIVE = 'INACTIVE';

    public function __construct(string $code, string $name, string $status, string $defaultCurrency, Language $defaultLanguage, string $defaultTimezone, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getName(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getStatus(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isActive(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDefaultCurrency(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDefaultLanguage(): Language
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getDefaultTimezone(): string
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

    public function deactivate(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function activate(\DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
