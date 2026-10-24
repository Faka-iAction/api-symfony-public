<?php

namespace App\Block\Payment;

use App\Action\ActionConfig;
use App\Action\ActionType;
use App\Entity\CashReceipt;
use App\Entity\CreatorAction;
use App\Entity\CreatorProfile;

/**
 * Where cash in person may be offered (architecture 12.5.3; TIS 9.4; decision 3): the Creator
 * Action is paid and enables cash, it is not a Bid, and the recipient profile is self-managed,
 * so that its owner can personally confirm receipt. Every condition is checked again whatever
 * the configuration says: a Bid never offers cash, even if a stored configuration did.
 */
final class CashOffer
{
    public const DISPLAY_NAME = 'Cash to the creator in person';

    public static function available(CreatorAction $action, ActionConfig $config): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The cash entry of a method list, or nothing.
     *
     * @return list<array{code: string, kind: string, displayName: string}>
     */
    public static function methods(CreatorAction $action, ActionConfig $config): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
