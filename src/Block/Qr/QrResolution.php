<?php

namespace App\Block\Qr;

final readonly class QrResolution
{
    /**
     * @param string      $qrId          the identifier as it was asked for
     * @param string|null $creatorHandle the current handle of the destination; set only when ACTIVE
     */
    public function __construct(
        public string $qrId,
        public QrStatus $status,
        public ?string $creatorHandle,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
