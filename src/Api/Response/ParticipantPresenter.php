<?php

namespace App\Api\Response;

use App\Block\Action\Page;
use App\Block\Action\ParticipantActionBlock;
use App\Block\Action\ParticipantView;
use App\Block\Payment\PaymentBlock;
use App\Block\Payment\PaymentView;
use App\Entity\CashReceipt;
use App\Entity\ParticipantAction;

/**
 * ParticipantAction (what the participant sees), IncomingAction (what the creator sees) and
 * SubmissionResult, and BidPosition. `bid` is set for a Bid only (BidStatus) and
 * `cashReceipt` only where cash in person was chosen (CashReceiptSummary).
 *
 * The creator sees `MEMBER` or `GUEST` and a member's display name, nothing more: never an
 * identifier or a contact detail of the participant (IncomingParticipant).
 */
final class ParticipantPresenter
{
    /**
     * Schema: ParticipantAction.
     *
     * @return array<string, mixed>
     */
    public static function participantAction(ParticipantView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: ParticipantActionPage.
     *
     * @param Page<ParticipantView> $page
     *
     * @return array<string, mixed>
     */
    public static function participantActionPage(Page $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: SubmissionResult. A paid Action that still needs its payment lists the methods
     * the server offers for it; a free one needs none.
     *
     * @param list<array{code: string, kind: string, displayName: string}> $methods the online methods offered now
     *
     * @return array<string, mixed>
     */
    public static function submission(ParticipantView $view, array $methods = []): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: IncomingAction.
     *
     * @return array<string, mixed>
     */
    public static function incomingAction(ParticipantView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: IncomingActionPage.
     *
     * @param Page<ParticipantView> $page
     *
     * @return array<string, mixed>
     */
    public static function incomingActionPage(Page $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: BidPosition.
     *
     * @return array<string, mixed>
     */
    public static function bidPosition(ParticipantView $view, \DateTimeImmutable $asOf): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
