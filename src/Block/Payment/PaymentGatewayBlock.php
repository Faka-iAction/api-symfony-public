<?php

namespace App\Block\Payment;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Config\ConfigSecretBox;
use App\Config\ConfigSecretUnavailable;
use App\Entity\Member;
use App\Entity\PaymentGateway;
use App\Repository\PaymentGatewayRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Payment gateway accounts managed by operators in the backend (ADR-040), not in the
 * environment: the admin's Payment gateways page writes them, the provider adapters read them.
 *
 * A secret key is encrypted before it is stored, is never shown again, and is never in the
 * audit log; only whether one is set, and whether the keys are test or live, are. Keys are read
 * fresh at most every CACHE_SECONDS, so a long-running worker picks up a change without a restart.
 */
final class PaymentGatewayBlock
{
    public const COUNTRY = 'ZA';

    public function __construct(
        private readonly PaymentGatewayRepository $gateways,
        private readonly ConfigSecretBox $secrets,
        private readonly EntityManagerInterface $entityManager,
        private readonly AuditLogBlock $audit,
        private readonly ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The keys of an active, complete gateway account; null when there is none, it is switched
     * off, or the secret cannot be read (no encryption key, or another key).
     *
     * @return array{publicKey: string, secretKey: string}|null
     */
    public function credentials(string $provider, string $countryCode = self::COUNTRY): ?array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Every gateway account there is, for the admin page; secrets stay sealed.
     *
     * @return list<PaymentGateway>
     */
    public function all(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string|null $secretKey null or empty keeps the stored secret key
     *
     * @throws \DomainException with a message for the operator; nothing is saved
     */
    public function save(Member $admin, string $provider, string $countryCode, string $publicKey, ?string $secretKey, bool $active): PaymentGateway
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
