<?php

namespace App\Payment\Provider;

/**
 * No credentials are configured: nothing was sent (fail closed).
 */
final class ProviderNotConfigured extends ProviderException
{
}
