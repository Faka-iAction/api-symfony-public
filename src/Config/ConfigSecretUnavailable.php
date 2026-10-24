<?php

namespace App\Config;

/**
 * A configuration secret cannot be stored or read: no encryption key, or the wrong one.
 */
final class ConfigSecretUnavailable extends \RuntimeException
{
}
