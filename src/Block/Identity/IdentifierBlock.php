<?php

namespace App\Block\Identity;

use App\Entity\Member;
use App\Entity\MemberIdentifier;
use App\Entity\VerificationChallenge;
use App\Identity\SecretFactory;
use App\Identity\Social\SocialCredentialRejected;
use App\Identity\Social\SocialCredentialType;
use App\Identity\Social\SocialIdentityVerifier;
use App\Identity\Social\SocialProvider;
use App\Identity\Social\SocialProviderUnavailable;
use App\Repository\MemberIdentifierRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\LockMode;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;

/**
 * A signed-in member's sign-in identifiers: listing, adding and removing them
 * (CONVENTIONS.md, section 12.4).
 */
final readonly class IdentifierBlock
{
    public function __construct(
        private MemberIdentifierRepository $identifiers,
        private VerificationBlock $verification,
        private SocialIdentityVerifier $socialVerifier,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private ClockInterface $clock,
        private ManagerRegistry $registry,
        private IdentityRecords $records,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Oldest first.
     *
     * @param int         $limit  validated by the caller
     * @param string|null $cursor the nextCursor of the previous page
     *
     * @throws IdentityException INVALID_CURSOR
     */
    public function list(Member $member, int $limit, ?string $cursor): IdentifierPage
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Sends a code to an email address or phone number the member wants to add. The
     * identifier is attached only by confirm(). The outcome is the same whether or not
     * the identifier belongs to somebody else.
     *
     * @throws IdentityException CODE_REQUESTED_TOO_SOON
     */
    public function requestContact(Member $member, ContactIdentifier $identifier): IssuedChallenge
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws IdentityException VERIFICATION_FAILED, for every cause, or IDENTIFIER_NOT_AVAILABLE once the code was right
     */
    public function confirm(Member $member, string $verificationId, #[\SensitiveParameter] string $code): MemberIdentifier
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Attaches a social identity. The provider credential is the proof of control.
     *
     * @throws IdentityException VERIFICATION_FAILED, PROVIDER_UNAVAILABLE or IDENTIFIER_NOT_AVAILABLE
     */
    public function addSocial(
        Member $member,
        SocialProvider $provider,
        SocialCredentialType $credentialType,
        #[\SensitiveParameter]
        string $credential,
        ?string $nonce,
    ): MemberIdentifier {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws IdentityException IDENTIFIER_NOT_FOUND or LAST_IDENTIFIER
     */
    public function remove(Member $member, string $identifierId): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
