<?php

namespace App\Admin;

/**
 * The platform's administrative roles (TIS 10.2: least privilege and separation of duties;
 * architecture 27 and 43.2). Each admin page and action names the roles that may use it
 * (App\Admin\RequiresAdminRole) and is refused, server-side, for every other member.
 *
 * - SUPPORT reads: the audit log, the outbox and the country configuration. It changes
 *   nothing.
 * - MODERATOR works the moderation queue and takes moderation decisions.
 * - OPERATIONS requeues dead outbox events and changes country configuration.
 *
 * A role is granted and revoked by console command only (app:admin:role:grant and
 * app:admin:role:revoke): there is no self-service and no web page that grants one.
 * The names are this backend's proposal; the domain model has no admin role table yet.
 */
enum AdminRole: string
{
    case SUPPORT = 'ADMIN_SUPPORT';
    case MODERATOR = 'ADMIN_MODERATOR';
    case OPERATIONS = 'ADMIN_OPERATIONS';

    public function label(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return list<string>
     */
    public static function codes(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
