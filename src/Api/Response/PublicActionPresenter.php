<?php

namespace App\Api\Response;

use App\Action\ActionType;
use App\Action\Money;
use App\Block\Action\CreatorActionView;
use App\Block\Payment\CashOffer;
use App\Block\Action\Page;
use App\Block\Action\PublicChoice;

/**
 * The public projections PublicCreatorAction and PublicActionOption. Both are allowlists
 * (CONVENTIONS.md, section 1): each body is built here field by field from the contract's
 * list, never by removing fields from the owner's view, so that a field added to a Creator
 * Action cannot leak.
 */
final class PublicActionPresenter
{
    /**
     * Schema: PublicCreatorAction.
     *
     * acceptedPaymentMethods lists the online methods for a paid Action when a payment
     * provider key is configured ($onlineMethods, PaymentBlock::onlineMethods()), and
     * CASH_IN_PERSON where the Creator Action enables cash on a self-managed profile; never
     * for a Bid (decision 3). bidRanking is the Bid's ranking now (BidRankingSummary).
     *
     * @param list<array{code: string, kind: string, displayName: string}> $onlineMethods
     *
     * @return array<string, mixed>
     */
    public static function creatorAction(CreatorActionView $view, array $onlineMethods = []): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PublicCreatorActionPage.
     *
     * @param Page<CreatorActionView>                                        $page
     * @param list<array{code: string, kind: string, displayName: string}> $onlineMethods
     *
     * @return array<string, mixed>
     */
    public static function creatorActionPage(Page $page, array $onlineMethods = []): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PublicActionOption.
     *
     * @return array<string, mixed>
     */
    public static function choice(PublicChoice $choice): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
