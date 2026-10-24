<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\PaymentGatewayRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A payment gateway account as operators configured it (ADR-040), one per provider and country,
 * after EasyApply's payment_gateway_config. The secret key is stored only encrypted
 * (ConfigSecretBox); the public key is not a secret.
 */
#[ORM\Entity(repositoryClass: PaymentGatewayRepository::class)]
#[ORM\Table(name: 'payment_gateways')]
#[ORM\UniqueConstraint(name: 'uniq_payment_gateways_provider_country', columns: ['provider', 'country_code'])]
class PaymentGateway
{
    public const PAYSTACK = 'paystack';
    public const PROVIDERS = [self::PAYSTACK];

    public function __construct(string $provider, string $countryCode, \DateTimeImmutable $now)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getProvider(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCountryCode(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicKey(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSecretKeySealed(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function hasSecretKey(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isActive(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getUpdatedBy(): ?string
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
     * @param string|null $secretKeySealed null keeps the stored secret key
     */
    public function change(?string $publicKey, ?string $secretKeySealed, bool $active, string $by, \DateTimeImmutable $now): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
