<?php

namespace App\Doctrine;

use App\Entity\AuditLog;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;

/**
 * Keeps the audit log append-only at the ORM level: a flush that would update or delete an
 * AuditLog row is refused before any statement is sent. (The entity is read-only to
 * Doctrine, so an update is not even scheduled; a removal would be.) Bulk DQL and raw SQL
 * do not pass through here: nothing in the code base issues either against audit_logs,
 * and a test checks that.
 */
#[AsDoctrineListener(event: Events::onFlush)]
final class AuditLogGuard
{
    public function onFlush(OnFlushEventArgs $args): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
