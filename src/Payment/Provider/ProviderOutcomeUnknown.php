<?php

namespace App\Payment\Provider;

/**
 * The request may have taken effect. Reconcile it; never repeat it blindly.
 */
final class ProviderOutcomeUnknown extends ProviderException
{
}
