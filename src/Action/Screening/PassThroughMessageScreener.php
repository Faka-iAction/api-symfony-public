<?php

namespace App\Action\Screening;

/**
 * Lets every message through. For tests and local work where screening is not the subject.
 */
final class PassThroughMessageScreener implements MessageScreener
{
    public function passes(string $message): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
