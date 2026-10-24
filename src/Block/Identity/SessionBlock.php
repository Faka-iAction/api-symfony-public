<?php

namespace App\Block\Identity;

use App\Block\Audit\AuditActor;
use App\Block\Audit\AuditLogBlock;
use App\Entity\Member;
use App\Entity\MemberSession;
use App\Identity\IdentitySettings;
use App\Identity\SecretFactory;
use App\Repository\MemberSessionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * API sessions: issuing a token pair, resolving an access token, rotating a refresh
 * token and signing out.
 *
 * Tokens are opaque random strings; only their hashes are stored, so a token can be
 * revoked at once and a copy of the database cannot be used to sign in.
 */
final readonly class SessionBlock
{
    public const ACCESS_TOKEN_PREFIX = 'at_';
    public const REFRESH_TOKEN_PREFIX = 'rt_';

    /** Audit reasons for revoking a token family on refresh. */
    public const REVOKED_ON_REUSE = 'refresh_token_reuse';
    public const REVOKED_MEMBER_INACTIVE = 'member_not_active';

    public function __construct(
        private MemberSessionRepository $sessions,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private IdentitySettings $settings,
        private ClockInterface $clock,
        private AuditLogBlock $audit,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Starts a new session (a new token family) for a member who has just proved who they are.
     */
    public function open(Member $member): IssuedTokens
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws IdentityException ACCESS_TOKEN_INVALID or ACCESS_TOKEN_EXPIRED
     */
    public function authenticate(#[\SensitiveParameter] string $accessToken): MemberSession
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Exchanges a refresh token for a new pair and retires the one presented.
     *
     * A refresh token that was already exchanged is a sign that it was copied: the
     * holder of either copy may be the thief, so the whole family is revoked and the
     * member has to sign in again. There is no grace window.
     *
     * @throws IdentityException REFRESH_TOKEN_INVALID, for every cause
     */
    public function refresh(#[\SensitiveParameter] string $refreshToken): IssuedTokens
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Revokes the session the token pair belongs to, refresh token included. Other
     * sessions of the member are left alone.
     */
    public function close(MemberSession $session): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
