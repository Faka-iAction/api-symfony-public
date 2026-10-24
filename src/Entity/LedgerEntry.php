<?php

namespace App\Entity;

use App\Doctrine\UtcDateTimeImmutableType;
use App\Repository\LedgerEntryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * One line of the financial ledger (architecture 14 and 62.5; TIS 9.3). Append-only: there is
 * no setter, the entity is read-only to Doctrine, and LedgerGuard refuses a removal. A
 * correction is a new line that names the one it reverses.
 *
 * Double entry. Lines are grouped in journals (`journal_key`, one per financial event, for
 * example a confirmed payment); the amounts of one journal add up to zero. The sign is the
 * accounting side: positive is a debit, negative a credit. `(journal_key, line_no)` is
 * unique, so a journal is posted once however many times its event is processed.
 *
 * Accounts (LedgerAccount): the creator's entitlement (a liability to the creator: a credit
 * raises it), FAKA's provider balance, the platform's fee revenue, and payouts in transit.
 * None of them is a wallet: nothing is spent from them and no balance column exists anywhere
 * (architecture 14.2); every figure shown is summed from these lines when it is asked for.
 */
#[ORM\Entity(repositoryClass: LedgerEntryRepository::class, readOnly: true)]
#[ORM\Table(name: 'ledger_entries')]
#[ORM\UniqueConstraint(name: 'uniq_ledger_entries_public_id', columns: ['public_id'])]
#[ORM\UniqueConstraint(name: 'uniq_ledger_entries_journal_line', columns: ['journal_key', 'line_no'])]
#[ORM\Index(name: 'idx_ledger_entries_creator', columns: ['creator_profile_id', 'account', 'occurred_at'])]
#[ORM\Index(name: 'idx_ledger_entries_payment', columns: ['payment_id'])]
class LedgerEntry
{

    public function __construct(
        string $publicId,
        string $journalKey,
        int $lineNo,
        string $entryType,
        string $account,
        int $amountMinor,
        string $currency,
        ?CreatorProfile $creatorProfile,
        ?Payment $payment,
        ?ParticipantAction $participantAction,
        ?LedgerEntry $reversesEntry,
        \DateTimeImmutable $occurredAt,
        \DateTimeImmutable $now,
        ?CashReceipt $cashReceipt = null,
        ?Payout $payout = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getId(): ?int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPublicId(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getJournalKey(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getLineNo(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getEntryType(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAccount(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getAmountMinor(): int
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCurrency(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatorProfile(): ?CreatorProfile
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayment(): ?Payment
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getParticipantAction(): ?ParticipantAction
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getReversesEntry(): ?LedgerEntry
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCashReceipt(): ?CashReceipt
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getPayout(): ?Payout
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getOccurredAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
