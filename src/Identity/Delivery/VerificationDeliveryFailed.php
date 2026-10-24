<?php

namespace App\Identity\Delivery;

/**
 * A provider refused or could not take a code. Messenger retries the message on it.
 *
 * Its text is already scrubbed of the code and the full recipient, and it deliberately has
 * no previous exception: a provider exception may quote both (a Mailer TransportException
 * even keeps the whole SMTP conversation), and logs serialise the chain.
 */
final class VerificationDeliveryFailed extends \RuntimeException
{
}
