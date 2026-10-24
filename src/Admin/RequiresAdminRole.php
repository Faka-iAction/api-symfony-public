<?php

namespace App\Admin;

/**
 * Names the admin roles that may use an admin controller action. Every controller action
 * under /admin must carry it: App\EventSubscriber\AdminGateSubscriber refuses one that does
 * not (fail closed), and refuses a member who holds none of the roles, with the same
 * not-found page as an unknown address.
 *
 * Hiding a link is never the check: this is.
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
final readonly class RequiresAdminRole
{
    /** @var list<AdminRole> */
    public array $roles;

    /**
     * @param list<AdminRole> $roles     any one of them is enough; empty means any admin role
     * @param bool            $recentSignIn false only for the page that asks to sign in again
     */
    public function __construct(array $roles = [], public bool $recentSignIn = true)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param list<AdminRole> $held
     */
    public function allows(array $held): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
