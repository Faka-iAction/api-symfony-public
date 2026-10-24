<?php

namespace App\Block\Audit;

use App\Entity\GuestSession;
use App\Entity\Member;

/**
 * Who made an audited change: a member or a guest session (by public ID), the system
 * itself (a rule applied without anyone asking), or a console command (by name).
 */
final readonly class AuditActor
{
    public const MEMBER = 'MEMBER';
    public const GUEST = 'GUEST';
    public const SYSTEM = 'SYSTEM';
    public const COMMAND = 'COMMAND';
    /** A member acting through the admin pages, under an admin role (domain model 10.9 `ADMIN`). */
    public const ADMIN = 'ADMIN';

    public static function member(Member $member): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function admin(Member $member): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function guest(GuestSession $guest): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function system(): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function command(string $name): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
