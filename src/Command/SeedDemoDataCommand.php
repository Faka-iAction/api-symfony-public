<?php

namespace App\Command;

use App\Action\Money;
use App\Admin\AdminRole;
use App\Block\Action\ActionOptionBlock;
use App\Block\Action\CreatorActionBlock;
use App\Block\Action\CreatorActionInput;
use App\Block\Action\GuestSessionBlock;
use App\Block\Action\Participant;
use App\Block\Action\ParticipationBlock;
use App\Block\Action\PlaylistBlock;
use App\Block\Admin\AdminRoleBlock;
use App\Block\Audit\AuditActor;
use App\Block\Creator\CreatorProfileBlock;
use App\Block\Creator\CreatorProfileInput;
use App\Block\Creator\FollowBlock;
use App\Block\Identity\MemberBlock;
use App\Entity\Member;
use App\Entity\MemberCredential;
use App\Entity\MemberIdentifier;
use App\Entity\QrResource;
use App\Identity\SecretFactory;
use App\Repository\MemberIdentifierRepository;
use App\Repository\QrResourceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * Demo data for local, dev and staging (ui-spec 6.3, "Seed content"): seven creators, DJ Sipho's
 * eight Creator Actions in their states, guest requests waiting for him, a fan who follows
 * Zodwa, the new creator Thandi M, and the demo QR code Ab3dEf7hJk that opens DJ Sipho's page.
 *
 * Everything goes through the Blocks, so the data obeys the same rules as data made through
 * the app; only the members are made directly, already verified, because a seed cannot read a
 * sign-in code.
 *
 * Sets (--set):
 * - `local` (default): also an admin with every role, and a password for every seeded member
 *   (--password), so anyone can sign in locally.
 * - `staging`: no admin and no password. Members sign in with a one-time code to their
 *   @example.com addresses only where a sender delivers there; staging admins are granted with
 *   app:admin:role:grant on a real member.
 *
 * Refused when FAKA_ENVIRONMENT is `production`. Run again, it finds the data and does nothing.
 */
#[AsCommand(name: 'app:seed:demo', description: 'Seeds the demo creators, Creator Actions, submissions and QR code for local, dev and staging.')]
final class SeedDemoDataCommand extends Command
{
    public const MARKER_EMAIL = 'djsipho@example.com';
    public const DEMO_QR_CODE = 'Ab3dEf7hJk';

    public function __construct(
        private readonly MemberBlock $members,
        private readonly CreatorProfileBlock $creatorProfiles,
        private readonly CreatorActionBlock $creatorActions,
        private readonly ActionOptionBlock $options,
        private readonly PlaylistBlock $playlists,
        private readonly ParticipationBlock $participation,
        private readonly GuestSessionBlock $guests,
        private readonly FollowBlock $follows,
        private readonly AdminRoleBlock $adminRoles,
        private readonly MemberIdentifierRepository $identifiers,
        private readonly QrResourceRepository $qrResources,
        private readonly PasswordHasherFactoryInterface $hashers,
        private readonly SecretFactory $secrets,
        private readonly EntityManagerInterface $entityManager,
        private readonly ClockInterface $clock,
        #[Autowire(env: 'default::FAKA_ENVIRONMENT')]
        private readonly ?string $environment,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function configure(): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
