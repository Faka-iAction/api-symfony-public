<?php

namespace App\Web;

use App\Action\ActionConfig;
use App\Action\ActionDefaults;
use App\Action\ActionType;
use App\Action\Money;
use App\Block\Action\CreatorActionView;

/**
 * The web form of a Creator Action: which fields a type shows, reading them into what
 * CreatorActionBlock takes, and the values to show again. Shape only, as the API's request
 * bodies check shape: every business rule (what applies to a type, policy limits, what a
 * live configuration must have) is the Block's (ConfigRules).
 *
 * Amounts are in rand with up to two decimals (MVP1 has one currency). Times are entered
 * and shown in UTC, and the page says so. The fulfilment period is entered in minutes.
 *
 * Not on the form yet, so left as they are: suggested tip amounts, cash in person, the
 * ranking rule and the display duration of a shout-out.
 */
final class CreatorActionForm
{
    public const CURRENCY = 'ZAR';

    public const TYPE_SLUGS = [
        'request' => ActionType::REQUEST,
        'vote' => ActionType::VOTE,
        'shout-out' => ActionType::SHOUT_OUT,
        'bid' => ActionType::BID,
        'tip' => ActionType::TIP,
    ];

    /**
     * @return list<string>
     */
    public static function configFields(string $type): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Whether a configuration of this type asks for a payment, as the form or the Block has it.
     *
     * @param array<string, mixed> $values
     */
    public static function isPaid(string $type, array $values): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * What a new Creator Action of the type shows: the Block's starting configuration.
     *
     * @param bool $guestsAllowed whether the creator's country lets guests take part now: where
     *                            it does not, guests start off, as in CreatorActionBlock::create()
     *
     * @return array<string, mixed>
     */
    public static function defaults(string $type, bool $guestsAllowed = true): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * What an existing Creator Action shows.
     *
     * @return array<string, mixed>
     */
    public static function fromView(CreatorActionView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Reads the posted form.
     *
     * @param array<mixed> $post
     *
     * @return array{values: array<string, mixed>, errors: array<string, string>, title: string, slug: string, description: string|null, startsAt: \DateTimeImmutable|null, endsAt: \DateTimeImmutable|null, config: array<string, mixed>}
     */
    public static function read(string $type, array $post, bool $creating): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The form field a Block field error belongs to, or null when the form has no such field.
     */
    public static function fieldOf(string $type, string $blockField): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A Block field code in plain words.
     */
    public static function message(string $field, string $code): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
