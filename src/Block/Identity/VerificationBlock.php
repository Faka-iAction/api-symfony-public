<?php

namespace App\Block\Identity;

use App\Entity\Member;
use App\Entity\VerificationChallenge;
use App\Identity\Delivery\VerificationCodeSender;
use App\Identity\IdentitySettings;
use App\Identity\SecretFactory;
use App\Repository\VerificationChallengeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * One-time codes: asking for one and presenting one.
 *
 * The rules that keep a caller from learning whether an identifier is registered
 * (CONVENTIONS.md, section 12.3) are applied here: a challenge is written for every
 * request, and presenting a code fails in one way only.
 */
final readonly class VerificationBlock
{
    public function __construct(
        private VerificationChallengeRepository $challenges,
        private EntityManagerInterface $entityManager,
        private SecretFactory $secrets,
        private IdentitySettings $settings,
        private VerificationCodeSender $sender,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Replaces any open challenge for the identifier with a new one.
     *
     * @param bool                                 $deliver false when no code may reach anyone: the challenge is then
     *                                                      stored like any other but can never be completed
     * @param (callable(VerificationChallenge): void)|null $prepare attaches what the challenge must carry before it is stored
     *
     * @throws IdentityException CODE_REQUESTED_TOO_SOON, whether or not the identifier is registered
     */
    public function request(string $purpose, ContactIdentifier $identifier, bool $deliver, ?Member $member = null, ?callable $prepare = null): IssuedChallenge
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Uses a challenge up if the code is right. Every reason for refusing looks the same:
     * unknown challenge, wrong purpose or owner, expired, replaced, already used, out of
     * attempts, wrong code.
     *
     * @param list<string> $purposes the purposes the caller accepts
     * @param Member|null  $owner    when given, the member the challenge must have been issued to
     */
    public function redeem(string $verificationId, #[\SensitiveParameter] string $code, array $purposes, ?Member $owner = null): ?VerificationChallenge
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
