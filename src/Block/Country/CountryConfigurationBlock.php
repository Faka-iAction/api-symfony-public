<?php

namespace App\Block\Country;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Country\ConfigField;
use App\Country\ConfigFieldRegistry;
use App\Entity\CountryConfigOverride;
use App\Entity\CountryConfiguration;
use App\Entity\CreatorProfile;
use App\Entity\Member;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\CountryConfigurationRepository;
use App\Repository\CountryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Changes to country configuration. Every change is validated against the field registry
 * before anything is written, then stored as a new version together with its audit entry
 * and its CountryConfigurationUpdated event, in one transaction.
 *
 * Callers: the console command (App\Command\SetCountryConfigurationCommand) and the admin
 * country pages (App\Controller\Admin\CountryConfigurationController, ADMIN_OPERATIONS).
 * There is no API operation for it.
 */
final readonly class CountryConfigurationBlock
{
    public function __construct(
        private CountryConfigResolver $resolver,
        private CountryRepository $countries,
        private CountryConfigurationRepository $configurations,
        private EntityManagerInterface $entityManager,
        private AuditLogBlock $audit,
        private Outbox $outbox,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Adds the next version of a country's value for a field, effective from a moment (now
     * when none is given). The previous versions are kept; from that moment the new one
     * applies (CountryConfigurationRepository::findEffective()).
     *
     * @param string $changedBy who made the change, as recorded on the row (for example `COMMAND app:country:config:set`)
     * @param string $reason    why; never personal data
     *
     * @throws CountryPolicyException UNKNOWN_FIELD, FIELD_ON_COUNTRY_RECORD, UNKNOWN_COUNTRY or INVALID_VALUE
     */
    public function setValue(
        string $countryCode,
        string $key,
        mixed $value,
        ?\DateTimeImmutable $effectiveFrom,
        ?\DateTimeImmutable $effectiveUntil,
        AuditActor $actor,
        ?Member $changedByMember,
        string $changedBy,
        string $reason,
    ): CountryConfiguration {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Everything setValue() would check, without writing anything: for a confirmation step
     * that shows the change before it is made. Returns the field and the value that would
     * be replaced at the moment the change takes effect (null when nothing resolves there).
     *
     * @return array{field: ConfigField, current: ResolvedValue|null}
     *
     * @throws CountryPolicyException as setValue() would
     */
    public function preview(string $countryCode, string $key, mixed $value, ?\DateTimeImmutable $effectiveFrom, ?\DateTimeImmutable $effectiveUntil, string $reason): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A creator-level override (domain model 8.3). Refused unless the field is marked
     * overridable and, for mandatory policy, the value narrows the country's value at the
     * moment it takes effect. No field is overridable at launch (OQ-29), so with the
     * platform's registry this always refuses.
     *
     * @throws CountryPolicyException UNKNOWN_FIELD, OVERRIDE_NOT_PERMITTED, INVALID_VALUE, OVERRIDE_WEAKENS_POLICY,
     *                                or what resolving the policy throws
     */
    public function setOverride(CreatorProfile $profile, string $key, mixed $value, Member $setBy, ?\DateTimeImmutable $effectiveFrom = null): CountryConfigOverride
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
