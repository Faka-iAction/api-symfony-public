<?php

namespace App\Block\Creator;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Block\Country\CountryBlock;
use App\Block\Country\CountryPolicyException;
use App\Block\Country\CountryPolicyFailure;
use App\Block\Qr\QrResourceBlock;
use App\Entity\CreatorCategory;
use App\Entity\CreatorLanguage;
use App\Entity\CreatorLocation;
use App\Entity\CreatorProfile;
use App\Entity\CreatorPublicLink;
use App\Entity\Member;
use App\Entity\MemberCapability;
use App\Identity\SecretFactory;
use App\Outbox\EventTypes;
use App\Outbox\Outbox;
use App\Repository\CreatorCategoryRepository;
use App\Repository\CreatorLanguageRepository;
use App\Repository\CreatorLocationRepository;
use App\Repository\CreatorProfileRepository;
use App\Repository\CreatorPublicLinkRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;

/**
 * A member's own creator profile: becoming a creator, reading it and changing it.
 *
 * Refusals are decided before anything is written. The unique constraints on the member
 * and on every handle ever held settle what two requests racing each other could both
 * have passed; losing such a race gives the same refusal as arriving second.
 */
final readonly class CreatorProfileBlock
{
    public const HANDLE = 'handle';
    public const DISPLAY_NAME = 'displayName';
    public const BIO = 'bio';
    public const CATEGORY = 'category';
    public const COUNTRY = 'country';
    public const CITY = 'city';
    public const LANGUAGES = 'languages';
    public const LINKS = 'links';

    public function __construct(
        private CreatorProfileRepository $profiles,
        private CreatorCategoryRepository $categories,
        private CreatorLocationRepository $locations,
        private CreatorLanguageRepository $languages,
        private CreatorPublicLinkRepository $links,
        private HandleBlock $handles,
        private QrResourceBlock $qrResources,
        private CreatorViewLoader $views,
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private Outbox $outbox,
        private AuditLogBlock $audit,
        private CountryBlock $countries,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Creates the member's creator profile and gives them the CREATOR capability, with
     * the profile's first QR code. The member's identity and sessions do not change.
     *
     * The country must be one the platform knows and has ACTIVE (architecture 16).
     *
     * @throws CreatorException PROFILE_EXISTS, HANDLE_TAKEN, UNKNOWN_CATEGORY, UNKNOWN_COUNTRY or COUNTRY_NOT_AVAILABLE
     */
    public function become(Member $member, CreatorProfileInput $input): CreatorView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The category codes a creator can choose now: what become() and update() accept.
     *
     * @return list<string>
     */
    public function categoryCodes(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws CreatorException PROFILE_NOT_FOUND
     */
    public function own(Member $member): CreatorView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Partial update: a key that is absent is left unchanged, a key that is present
     * replaces the value, and null clears it. Languages and links are replaced as a whole.
     * A new handle renames the profile; the old one stays reserved for it.
     *
     * The change is applied under the profile's row lock to the profile as the lock reloads
     * it, so two updates at once run one after the other: fields one of them does not name
     * keep what the other wrote (contract item 36 leaves concurrent updates at last write
     * wins), and the handle history, languages and location cannot be written twice.
     *
     * @param array<self::*, mixed> $changes validated by the caller: strings, null only for bio and
     *                                       city, list<string> for languages, list<CreatorLinkInput> for links
     *
     * A new country must be ACTIVE. A profile whose country has since become INACTIVE keeps
     * it, and can still be updated as long as the update does not move it to another
     * country that is not ACTIVE.
     *
     * @throws CreatorException PROFILE_NOT_FOUND, HANDLE_TAKEN, UNKNOWN_CATEGORY, UNKNOWN_COUNTRY or COUNTRY_NOT_AVAILABLE
     */
    public function update(Member $member, array $changes): CreatorView
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
