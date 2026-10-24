<?php

namespace App\Block\Identity;

use App\Entity\Member;
use App\Entity\MemberCredential;
use App\Entity\MemberIdentifier;
use App\Entity\VerificationChallenge;
use App\Identity\IdentitySettings;
use App\Identity\SecretFactory;
use App\Identity\Social\SocialCredentialRejected;
use App\Identity\Social\SocialCredentialType;
use App\Identity\Social\SocialIdentityVerifier;
use App\Identity\Social\SocialProvider;
use App\Identity\Social\SocialProviderUnavailable;
use App\Repository\MemberCredentialRepository;
use App\Repository\MemberIdentifierRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\LockMode;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Clock\ClockInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * Registration and sign-in, by one-time code, by password and by social login.
 *
 * A member is created in two places only: when a registration challenge is completed,
 * and on the first use of a social identity (CONVENTIONS.md, section 12.2).
 */
final readonly class SignInBlock
{
    public function __construct(
        private VerificationBlock $verification,
        private SessionBlock $sessions,
        private MemberBlock $members,
        private MemberIdentifierRepository $identifiers,
        private MemberCredentialRepository $credentials,
        private SocialIdentityVerifier $socialVerifier,
        private PasswordHasherFactoryInterface $hasherFactory,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private IdentitySettings $settings,
        private ClockInterface $clock,
        private CacheInterface $cache,
        private ManagerRegistry $registry,
        private IdentityRecords $records,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Starts a registration. Nothing is created yet, and the outcome is the same whether
     * or not the identifier is registered: if it is, the code signs its owner in and the
     * profile data and password given here are thrown away.
     *
     * @param string|null $password only with an email identifier; the caller has checked that
     */
    public function register(
        ContactIdentifier $identifier,
        string $displayName,
        ?string $country,
        ?string $locale,
        #[\SensitiveParameter]
        ?string $password,
    ): IssuedChallenge {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Asks for a sign-in code. For an identifier nobody can sign in with, a challenge is
     * still issued but no code is sent, so it can never be completed. Never creates a member.
     */
    public function startSignIn(ContactIdentifier $identifier): IssuedChallenge
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The web's one way to ask for a code (architecture 22.3): a registration challenge that
     * carries no profile, so the code signs in the owner of a registered identifier and
     * creates a member for a new one, exactly as completing the API's registerMember does.
     * A code is sent either way, so the answer does not tell whether the identifier is
     * registered. The member a code creates has no display name until they give one.
     *
     * @throws IdentityException CODE_REQUESTED_TOO_SOON, whether or not the identifier is registered
     */
    public function startWebSignIn(ContactIdentifier $identifier): IssuedChallenge
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws IdentityException INVALID_CREDENTIALS, for every cause
     */
    public function signInWithCode(string $verificationId, #[\SensitiveParameter] string $code): SignInOutcome
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The same as signInWithCode(), for a web session: no API session (token pair) is
     * opened. The web keeps the member in its own server-side session (architecture 43.1).
     *
     * @throws IdentityException INVALID_CREDENTIALS, for every cause
     */
    public function webSignInWithCode(string $verificationId, #[\SensitiveParameter] string $code): SignedIn
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws IdentityException INVALID_CREDENTIALS, for every cause
     */
    public function signInWithPassword(ContactIdentifier $identifier, #[\SensitiveParameter] string $password): SignInOutcome
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The same as signInWithPassword(), for a web session: no API session is opened.
     *
     * @throws IdentityException INVALID_CREDENTIALS, for every cause
     */
    public function webSignInWithPassword(ContactIdentifier $identifier, #[\SensitiveParameter] string $password): SignedIn
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string|null $displayName used only if this call creates the member and the provider gives no
     *                                 name; with neither, the member is created without a name
     * @param string|null $country     used only if this call creates the member
     * @param string|null $locale      used only if this call creates the member
     *
     * @throws IdentityException INVALID_CREDENTIALS or PROVIDER_UNAVAILABLE
     */
    public function signInWithSocial(
        SocialProvider $provider,
        SocialCredentialType $credentialType,
        #[\SensitiveParameter]
        string $credential,
        ?string $nonce,
        ?string $displayName,
        ?string $country,
        ?string $locale,
    ): SignInOutcome {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
