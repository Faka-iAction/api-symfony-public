<?php

namespace App\Block\Moderation;

use App\Entity\ActionMessage;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;
use App\Entity\ModerationAction;
use App\Entity\ModerationCase;
use App\Entity\QrResource;
use App\Entity\Report;

/**
 * A moderation case as a moderator reviews it: its reports, its decisions, its subject, and
 * what the decisions available now can act on (the creator's QR codes, the messages sent to
 * a Shout-out).
 */
final readonly class ModerationCaseView
{
    /**
     * @param list<Report>           $reports   oldest first
     * @param list<ModerationAction> $decisions oldest first
     * @param list<QrResource>       $qrCodes   the creator's codes
     * @param list<ActionMessage>    $messages  newest first: the message of the subject, or those sent to the Creator Action
     */
    public function __construct(
        public ModerationCase $case,
        public array $reports,
        public array $decisions,
        public CreatorProfile $profile,
        public ?CreatorAction $creatorAction,
        public array $qrCodes,
        public array $messages,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
