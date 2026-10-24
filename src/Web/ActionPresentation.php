<?php

namespace App\Web;

use App\Action\ActionState;
use App\Action\ActionType;
use App\Block\Action\CreatorActionView;

/**
 * How the web shows a public Creator Action: which form, if any, and what to say instead.
 * It only reads what the Blocks decided (state, openForParticipation, the configuration);
 * whether a submission is accepted is still decided by ParticipationBlock.
 */
final class ActionPresentation
{
    /** A form is shown. */
    public const FORM = 'form';
    /** The Action needs a payment that cannot be made here: no provider key is configured. */
    public const PAID = 'paid';
    /** Published, not open yet (decision 17). */
    public const NOT_OPEN_YET = 'not_open_yet';
    public const PAUSED = 'paused';
    /** Active, but outside its window at the moment. */
    public const CLOSED = 'closed';
    /** The creator does not allow guests, and the visitor is not signed in. */
    public const MEMBERS_ONLY = 'members_only';

    /** The types that can be sent through a web form: all five. */
    public const WEB_TYPES = [ActionType::REQUEST, ActionType::VOTE, ActionType::BID, ActionType::SHOUT_OUT, ActionType::TIP];

    /**
     * @param bool $asMember the visitor is a signed-in member, who takes part as themselves
     *                       whether or not the creator allows guests
     * @param bool $paymentsAvailable a payment provider key is configured (PaymentBlock::paymentsAvailable())
     */
    public static function availability(CreatorActionView $view, bool $asMember = false, bool $paymentsAvailable = false): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
