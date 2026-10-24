<?php

namespace App\Repository;

use App\Action\ActionState;
use App\Block\Action\Participant;
use App\Doctrine\UtcDateTimeImmutableType;
use App\Entity\ActionOption;
use App\Entity\ActionRequest;
use App\Entity\ActionVote;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use App\Entity\GuestSession;
use App\Entity\Member;
use App\Entity\ParticipantAction;
use App\Entity\PlaylistItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\LockMode;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ParticipantAction>
 */
class ParticipantActionRepository extends ServiceEntityRepository
{
    use LocksRows;

    public function __construct(ManagerRegistry $registry)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Locks the Creator Action the participant Action is on, then the participant Action, and
     * reloads both. Same order as every other writer (CreatorActionRepository::lockForUpdate()).
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockForUpdate(ParticipantAction $action): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The participant Actions in the given states, locked and reloaded. The caller holds the
     * Creator Action's lock; the locking read also sees an Action committed after the
     * transaction's snapshot was taken.
     *
     * @param list<string> $states
     *
     * @return list<ParticipantAction>
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function lockOnCreatorActionInStates(CreatorAction $action, array $states): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The participant Actions that take up the Creator Action's quantity limit: every one
     * except those withdrawn or never paid.
     *
     * A locking read (FOR SHARE), counted while the caller holds the Creator Action's lock:
     * it sees every Action committed before the lock was granted, whatever the snapshot.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function countTakingQuantity(CreatorAction $action): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Votes that count, cast by this participant on this Creator Action. A locking read, as
     * countTakingQuantity().
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function countVotesBy(CreatorAction $action, Participant $participant): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether a Request for the same choice is still open on the Creator Action, by anyone.
     * A locking read, as countTakingQuantity().
     *
     * @throws \Doctrine\ORM\TransactionRequiredException outside a transaction
     */
    public function hasOpenRequestFor(CreatorAction $action, ?ActionOption $option, ?PlaylistItem $item): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One of the participant's own Actions. A member's own include those of every guest
     * session the member converted (GuestSession::$convertedMember): conversion links them,
     * and each keeps its guest reference (domain model 3.10).
     */
    public function findForParticipant(Participant $participant, string $publicId): ?ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The member's own Actions, most recent first: their own and those of every guest session
     * they converted (findForParticipant()).
     *
     * @return list<ParticipantAction>
     */
    public function pageForMember(Member $member, ?string $type, ?string $state, ?ParticipantAction $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * One guest session's own Actions, most recent first.
     *
     * @return list<ParticipantAction>
     */
    public function pageForGuest(GuestSession $guest, ?ParticipantAction $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many Actions a guest session has, in any state.
     */
    public function countForGuest(GuestSession $guest): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many Actions a guest session sent: those that reached the creator at some point.
     */
    public function countSentByGuest(GuestSession $guest): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function findIncoming(CreatorProfile $profile, string $publicId): ?ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The Actions on a creator's Creator Actions, oldest first. Without a state filter only
     * those that count are returned: submitted at some point.
     *
     * @return list<ParticipantAction>
     */
    public function pageIncoming(CreatorProfile $profile, ?CreatorAction $action, ?string $type, ?string $state, ?string $paymentMethodKind, ?ParticipantAction $after, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * How many Actions on a creator's Creator Actions (or on one of them) are in the given
     * states, optionally of the given types only.
     *
     * @param list<string>      $states
     * @param list<string>|null $types
     */
    public function countIncoming(CreatorProfile $profile, ?CreatorAction $action, array $states, ?array $types = null): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * INITIATED Actions with no open payment: candidates for FAILED once their payments'
     * checkout windows have closed (PaymentConfirmation::failIfUnpaid() decides).
     *
     * @return list<ParticipantAction>
     */
    public function findInitiatedWithoutOpenPayment(int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Actions waiting for the creator whose fulfilment deadline has passed.
     *
     * @return list<ParticipantAction>
     */
    public function findPastDeadline(\DateTimeImmutable $now, int $limit): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Counting votes per option, for the tally.
     *
     * @return array<int, int> vote count by option key
     */
    public function tally(CreatorAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
