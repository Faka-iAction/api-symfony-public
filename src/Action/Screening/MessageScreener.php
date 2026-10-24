<?php

namespace App\Action\Screening;

/**
 * The automatic screening of a participant's message before it is submitted (decision 22;
 * state-machines.md DN-20). A refused message is never stored and never charged for. The
 * creator still reviews what passes, after submission.
 *
 * What the real screening checks is not decided. This interface is where a moderation
 * service would be plugged in.
 */
interface MessageScreener
{
    public function passes(string $message): bool;
}
