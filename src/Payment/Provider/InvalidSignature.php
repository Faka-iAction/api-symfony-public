<?php

namespace App\Payment\Provider;

/**
 * A notification whose signature does not match its body.
 */
final class InvalidSignature extends ProviderException
{
}
