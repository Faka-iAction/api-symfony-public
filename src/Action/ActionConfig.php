<?php

namespace App\Action;

use App\Entity\Playlist;

/**
 * The rules of a Creator Action at one configuration version: the contract's
 * CreatorActionConfig, with the playlist as an entity. Immutable; a change is a new value.
 *
 * Keys of toArray() and with() are the contract's field names.
 */
final readonly class ActionConfig
{
    public const FIELDS = [
        'paymentRequirement', 'price', 'minimumBid', 'bidIncrement', 'rankingRule', 'maxBidsPerParticipant',
        'tipMinimum', 'tipMaximum', 'tipSuggestedAmounts', 'cashInPersonEnabled', 'guestParticipationAllowed',
        'approvalRequired', 'fulfilmentDeadlineRule', 'fulfilmentPeriodSeconds', 'quantityLimit',
        'duplicateSelectionsAllowed', 'votesPerParticipant', 'optionsSource', 'playlistId', 'messageEnabled',
        'messageMaxLength', 'displayDurationSeconds', 'customFieldEnabled', 'customFieldLabel', 'customFieldMaxLength',
    ];

    /** Amount fields, in the order their currencies are compared. */
    public const MONEY_FIELDS = ['price', 'minimumBid', 'bidIncrement', 'tipMinimum', 'tipMaximum'];

    /**
     * @param list<Money> $tipSuggestedAmounts
     */
    public function __construct(
        public string $paymentRequirement,
        public ?Money $price,
        public ?Money $minimumBid,
        public ?Money $bidIncrement,
        public ?string $rankingRule,
        public ?int $maxBidsPerParticipant,
        public ?Money $tipMinimum,
        public ?Money $tipMaximum,
        public array $tipSuggestedAmounts,
        public bool $cashInPersonEnabled,
        public bool $guestParticipationAllowed,
        public bool $approvalRequired,
        public ?string $fulfilmentDeadlineRule,
        public ?int $fulfilmentPeriodSeconds,
        public ?int $quantityLimit,
        public ?bool $duplicateSelectionsAllowed,
        public ?int $votesPerParticipant,
        public ?string $optionsSource,
        public ?Playlist $playlist,
        public bool $messageEnabled,
        public ?int $messageMaxLength,
        public ?int $displayDurationSeconds,
        public bool $customFieldEnabled,
        public ?string $customFieldLabel,
        public ?int $customFieldMaxLength,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The configuration a new Creator Action of this type starts with. Every default is
     * undecided; see ActionDefaults.
     *
     * @param bool $guestParticipationAllowed the creator's country policy
     *                                        (CountryBlock::actionPolicy()), which the Block
     *                                        always passes. Without it (a form's first view)
     *                                        guests start allowed; ConfigRules still refuses
     *                                        that wherever the country does not allow guests.
     */
    public static function defaultsFor(string $type, bool $guestParticipationAllowed = true): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array<string, mixed> keyed by contract field name; amounts as Money, the playlist as an entity
     */
    public function toArray(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param array<string, mixed> $changes keyed by contract field name, values already converted
     *                                      (Money, Playlist, list<Money>) and type-checked
     */
    public function with(array $changes): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isPaid(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The one currency of every amount in the configuration, or null when it has none.
     */
    public function currency(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
