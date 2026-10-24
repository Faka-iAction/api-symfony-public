<?php

namespace App\Command;

use App\Admin\AdminRole;
use App\Block\Identity\ContactIdentifier;
use App\Entity\Member;
use App\Repository\MemberIdentifierRepository;
use App\Repository\MemberRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * What the grant and revoke commands share: the member, by public ID or by a verified email
 * address; the role; and the mandatory reason. The output names the member by public ID
 * only, never by a contact detail.
 */
abstract class AdminRoleCommand extends Command
{
    public function __construct(
        private readonly MemberRepository $members,
        private readonly MemberIdentifierRepository $identifiers,
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

    abstract protected function change(Member $member, AdminRole $role, string $reason, OutputInterface $output): int;
}
