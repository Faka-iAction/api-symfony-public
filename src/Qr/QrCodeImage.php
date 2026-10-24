<?php

namespace App\Qr;

use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

/**
 * The image of a printed QR code. chillerlan/php-qrcode encodes the URL into a module
 * matrix; the SVG and the PNG are drawn here from that matrix, black on white with a quiet
 * zone, so both show exactly the same code and a test can read the PNG back.
 *
 * Error correction is level M (15%): a printed code survives a smudge or a fold, and a short
 * /q/ URL stays a small, easy-to-scan version.
 */
final readonly class QrCodeImage
{
    /** Light modules around the code, as the QR standard asks for. */
    public const QUIET_ZONE = 4;

    /**
     * The modules, quiet zone included: true is dark.
     *
     * @return list<list<bool>>
     */
    public function matrix(string $data): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Scalable, for the page and for print shops. One path, one unit per module; no script,
     * no external reference.
     */
    public function svg(string $data): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * A raster copy, for the PDF sheet and for anything that does not take SVG.
     *
     * @param int $scale pixels per module
     */
    public function png(string $data, int $scale = 16): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
