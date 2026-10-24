<?php

namespace App\Block\Action;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * The transaction a change to a Creator Action or participant Action runs in.
 *
 * The work takes its row locks first (CreatorActionRepository::lockForUpdate(),
 * ParticipantActionRepository::lockForUpdate()) and decides on what it reads under them.
 *
 * - A refusal (ActionException) thrown by the work is decided after the time-based
 *   transitions the work applied under the same lock; those are facts, so they are
 *   committed, and the refusal is thrown after the commit. A refusal must therefore be
 *   decided before the work writes anything of its own.
 * - A concurrent change that wins anyway (a stale lock version, or a state history row
 *   another request wrote for the same version) is refused with the operation's conflict
 *   code, never left to become a 500. The failed flush closed the entity manager, so it is
 *   replaced, as after any lost race in this code base.
 *
 * Not wrapInTransaction(): that closes the entity manager whenever the work throws, and a
 * refusal is an ordinary outcome.
 */
final readonly class ActionTransaction
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ManagerRegistry $registry,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @template T
     *
     * @param callable(): T $work
     * @param ActionFailure $conflict what a lost race is refused with: the operation's own conflict code
     *
     * @return T
     *
     * @throws ActionException the work's refusal, or $conflict
     */
    public function run(callable $work, ActionFailure $conflict): mixed
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
