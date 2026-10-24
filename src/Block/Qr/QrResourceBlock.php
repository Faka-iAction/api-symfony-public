<?php

namespace App\Block\Qr;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Creator\CreatorDefaults;
use App\Entity\CreatorProfile;
use App\Entity\QrResource;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\QrResourceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The lifecycle of a QR resource (state-machines.md section 14): generation, activation,
 * suspension, reinstatement, a limited validity, revocation and replacement.
 *
 * Not exposed over the API: the contract has no QR management operation yet. Each method
 * persists and leaves the flush to the caller, so a transition can be part of a larger
 * transaction (becoming a creator creates the first code).
 *
 * Each transition writes its event to the outbox (QrResourceCreated, QrResourceActivated,
 * QrResourceSuspended, QrResourceRevoked, QrResourceReplaced), after the entity has
 * accepted it, so a refused transition emits nothing. Suspension, revocation and
 * replacement are also audited. The aggregate ID is the short code: a QR resource has no
 * other public identifier, and the code is printed on the QR itself. Reaching the end of a
 * limited validity is not a stored transition (the state is computed when the code is
 * resolved), so QrResourceExpired is not emitted.
 */
final readonly class QrResourceBlock
{
    public function __construct(
        private QrResourceRepository $resources,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
        private Outbox $outbox,
        private AuditLogBlock $audit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The code a creator gets with their profile: generated and active at once, because
     * the profile is public from the start.
     */
    public function createFor(CreatorProfile $profile, ?string $label = null): QrResource
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The profile's code that resolves now, the oldest first; null when none does. Reads only.
     */
    public function currentFor(CreatorProfile $profile): ?QrResource
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A new code for the profile, in GENERATED. It does not resolve yet.
     */
    public function generate(CreatorProfile $profile, ?string $label = null): QrResource
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * GENERATED to ACTIVE, or SUSPENDED back to ACTIVE.
     *
     * @throws \DomainException when the target is not public, or from any other state
     */
    public function activate(QrResource $resource): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param AuditActor|null $actor who suspended it; the system when not given
     *
     * @throws \DomainException unless the code is ACTIVE
     */
    public function suspend(QrResource $resource, ?AuditActor $actor = null): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException once the code is withdrawn or replaced
     */
    public function limitValidity(QrResource $resource, \DateTimeImmutable $expiresAt): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Permanent: the code never resolves again and is never reissued. Use this, not
     * replace(), for a compromised code.
     *
     * @param AuditActor|null $actor who revoked it; the system when not given
     *
     * @throws \DomainException from REVOKED or REPLACED, or without a reason
     */
    public function revoke(QrResource $resource, string $reason, ?AuditActor $actor = null): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Issues an active successor for the same owner and target. The old code then leads
     * where the successor leads, so a printed copy keeps working (DN-45, ordinary
     * replacement).
     *
     * @param AuditActor|null $actor who replaced it; the system when not given
     *
     * @throws \DomainException unless the code is ACTIVE or SUSPENDED
     */
    public function replace(QrResource $resource, ?AuditActor $actor = null): QrResource
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
