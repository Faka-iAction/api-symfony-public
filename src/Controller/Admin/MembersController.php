<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Admin\MemberAccessBlock;
use App\Entity\Member;
use App\Repository\CreatorProfileRepository;
use App\Repository\MemberRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Members (ADR-039): support and moderators look an account up by public ID, email address or
 * phone number; a moderator blocks it (the member loses access to the account) or unblocks it,
 * with a reason. Audited by MemberAccessBlock.
 */
final class MembersController extends AdminController
{

    public function __construct(
        private readonly MemberAccessBlock $access,
        private readonly MemberRepository $members,
        private readonly CreatorProfileRepository $profiles,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/members', name: 'admin_members', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::MEMBERS_READ)]
    public function search(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/members/{memberId}', name: 'admin_member', requirements: ['memberId' => self::ID], methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::MEMBERS_READ)]
    public function member(string $memberId): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/members/{memberId}/{decision}', name: 'admin_member_access', requirements: ['memberId' => self::ID, 'decision' => 'block|unblock'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::MEMBERS_BLOCK)]
    public function access(string $memberId, string $decision, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
