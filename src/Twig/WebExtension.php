<?php

namespace App\Twig;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Action\Money;
use App\Block\Action\CreatorActionView;
use App\Entity\ActionMessage;
use App\Entity\ParticipantAction;
use App\Web\ActionPresentation;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Plain-English wording for the public web pages. Presentation only: every value it words
 * was decided by a Block.
 *
 * Times are shown in UTC and say so. A guest has told us no time zone, and a page that
 * guessed one could show the wrong hour.
 */
final class WebExtension extends AbstractExtension
{

    public function getFilters(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getFunctions(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function datetime(?\DateTimeImmutable $instant): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** The time of day only, as Activity shows it under its day heading. */
    public static function time(?\DateTimeImmutable $instant): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** A day heading (ui-spec 8.7): Today, Yesterday, or the date, in UTC. */
    public static function day(?\DateTimeImmutable $instant, \DateTimeImmutable $now): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * 5400 becomes "1 hour 30 minutes".
     */
    public static function duration(?int $seconds): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function money(?Money $money): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /** An amount in minor units and its currency, as web_money shows a Money. */
    public static function minorMoney(?int $amountMinor, ?string $currency): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function category(string $code): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function country(string $code): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function actionType(string $type): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Only https and http links are ever put in an href. The API accepts https only; this
     * is a second guard for whatever is already stored.
     */
    public static function safeUrl(string $url): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The fulfilment deadline rule in plain words (architecture 8.1; decision 24 gives a
     * free Action the same rule as a paid one). Null when the type has no deadline.
     */
    public static function deadlineRule(CreatorActionView $view): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @return array{label: string, detail: string}
     */
    public static function participantState(ParticipantAction $action): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A Creator Action's state as its creator reads it (decision 17: published and active differ).
     */
    public static function creatorActionState(string $state): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A participant Action's state as the creator reads it in the queue.
     */
    public static function incomingState(string $state): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public static function moderation(ActionMessage $message): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
