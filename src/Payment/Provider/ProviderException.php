<?php

namespace App\Payment\Provider;

/**
 * The failures of a PaymentProvider. Each subclass says what is known about the side
 * effect, which is what decides whether a retry is safe.
 */
abstract class ProviderException extends \RuntimeException
{
}
