<?php

namespace App\Block\Support;

use App\Block\Action\IssuedGuestSession;
use App\Entity\SupportTicket;

final readonly class OpenedTicket
{
    /**
     * @param IssuedGuestSession|null $issuedGuest the guest session made for a guest who had none
     */
    public function __construct(public SupportTicket $ticket, public ?IssuedGuestSession $issuedGuest)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
