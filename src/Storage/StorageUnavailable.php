<?php

namespace App\Storage;

/**
 * File storage cannot be used now: not configured, or the provider failed.
 */
final class StorageUnavailable extends \RuntimeException
{
}
