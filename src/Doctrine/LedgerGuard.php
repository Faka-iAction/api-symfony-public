<?php

namespace App\Doctrine;

use App\Entity\LedgerEntry;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;

/**
 * Keeps the ledger append-only at the ORM level, as AuditLogGuard does for the audit log
 * (architecture 14: corrections are compensating entries, never edits). The entity is
 * read-only to Doctrine, so an update is never scheduled; a removal is refused here.
 */
#[AsDoctrineListener(event: Events::onFlush)]
final class LedgerGuard
{
    public function onFlush(OnFlushEventArgs $args): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
