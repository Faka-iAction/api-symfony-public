<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\PlatformSettingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * An operator's override of one platform setting (App\Config\PlatformSettingDefinitions), after
 * EasyApply's app_settings. Without a row the environment's value applies. A secret setting's
 * value is stored only encrypted (ConfigSecretBox).
 */
#[ORM\Entity(repositoryClass: PlatformSettingRepository::class)]
#[ORM\Table(name: 'platform_settings')]
#[ORM\UniqueConstraint(name: 'uniq_platform_settings_name', columns: ['name'])]
class PlatformSetting
{

    public function __construct(string $name, string $value, string $by, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getName(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getValue(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedBy(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function change(string $value, string $by, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
