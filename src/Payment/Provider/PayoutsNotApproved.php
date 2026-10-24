<?php

namespace App\Payment\Provider;

/**
 * The legal gate of decision 26 is closed: the configured key is a live one and the
 * deployment has not approved live payouts (PAYOUTS_LIVE_APPROVED). Nothing was sent.
 */
final class PayoutsNotApproved extends ProviderException
{
}
