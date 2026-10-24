<?php

namespace App\Api\Response;

use App\Block\Identity\IdentifierPage;
use App\Block\Identity\IssuedChallenge;
use App\Block\Identity\IssuedTokens;
use App\Block\Identity\SignInOutcome;
use App\Entity\Member;
use App\Entity\MemberIdentifier;

/**
 * The response shapes of the identity operations, field for field as the contract's
 * schemas list them. A required field without a value is sent as null, never omitted.
 */
final class IdentityPresenter
{

    /**
     * Schema: Member.
     *
     * @return array<string, mixed>
     */
    public static function member(Member $member, bool $hasPassword): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: VerificationChallenge.
     *
     * @return array<string, mixed>
     */
    public static function challenge(IssuedChallenge $challenge): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: TokenPair.
     *
     * @return array<string, mixed>
     */
    public static function tokens(IssuedTokens $tokens): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: SignInResult.
     *
     * @return array<string, mixed>
     */
    public static function signIn(SignInOutcome $outcome): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: MemberIdentifier. For a social identity the value is the email the
     * provider reports, for display; the provider's subject is never sent.
     *
     * @return array<string, mixed>
     */
    public static function identifier(MemberIdentifier $identifier): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: MemberIdentifierPage.
     *
     * @return array<string, mixed>
     */
    public static function identifierPage(IdentifierPage $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: MemberCapabilities.
     *
     * @param list<string> $capabilities
     *
     * @return array<string, mixed>
     */
    public static function capabilities(array $capabilities): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
