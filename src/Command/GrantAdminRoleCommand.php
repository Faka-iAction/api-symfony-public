<?php

namespace App\Command;

use App\Admin\AdminRole;
use App\Block\Admin\AdminRoleBlock;
use App\Block\Audit\AuditActor;
use App\Entity\Member;
use App\Repository\MemberIdentifierRepository;
use App\Repository\MemberRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Gives a member an admin role, with an audit entry and an AdminRoleGranted event (a
 * proposed name). The only way a role is granted: there is no web or API path for it.
 */
#[AsCommand(
    name: self::NAME,
    description: 'Grants an admin role to a member (audited, with an event).',
)]
final class GrantAdminRoleCommand extends AdminRoleCommand
{
    public const NAME = 'app:admin:role:grant';

    public function __construct(
        private readonly AdminRoleBlock $roles,
        MemberRepository $members,
        MemberIdentifierRepository $identifiers,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    protected function change(Member $member, AdminRole $role, string $reason, OutputInterface $output): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
