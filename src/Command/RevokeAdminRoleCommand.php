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
 * Takes an admin role away from a member, with an audit entry and an AdminRoleRevoked event
 * (a proposed name). It takes effect on the member's next request.
 */
#[AsCommand(
    name: self::NAME,
    description: 'Revokes an admin role from a member (audited, with an event).',
)]
final class RevokeAdminRoleCommand extends AdminRoleCommand
{
    public const NAME = 'app:admin:role:revoke';

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
