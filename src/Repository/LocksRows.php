<?php

namespace App\Repository;

use Doctrine\DBAL\LockMode;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Doctrine\ORM\TransactionRequiredException;

/**
 * Row locks for the repositories that need them (SELECT ... FOR UPDATE or FOR SHARE on
 * MySQL; SQLite has no row locks and runs the same statement without the clause).
 *
 * The row is read again with the lock and the managed entity is refreshed from it. On
 * InnoDB a locking read returns the latest committed row even when the transaction's
 * snapshot is older (REPEATABLE READ), which a plain refresh would not: that matters
 * because a submission runs inside the idempotency transaction, whose snapshot was
 * taken by earlier reads.
 */
trait LocksRows
{
    abstract protected function getEntityManager(): EntityManagerInterface;
}
