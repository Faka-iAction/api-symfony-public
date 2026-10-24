<?php

namespace App\Payment\Provider;

/**
 * A definite refusal: the provider created nothing, so a later attempt is safe.
 */
final class ProviderRejected extends ProviderException
{
}
