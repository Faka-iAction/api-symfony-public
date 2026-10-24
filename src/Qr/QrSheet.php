<?php

namespace App\Qr;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Twig\Environment;

/**
 * The printable QR sheet: one A4 page with the creator's name, their QR code, the code in
 * letters for anyone without a camera, and where to type it.
 *
 * Dompdf (pure PHP, decision D7) renders templates/pdf/qr_sheet.html.twig. Remote loading,
 * PHP and JavaScript in the document are off: the only image is the code, passed in as a
 * data URI, and every text is the creator's, escaped by Twig. Dompdf's font cache and
 * temporary files go to the kernel cache, never to vendor/ or the release.
 */
final readonly class QrSheet
{
    public function __construct(
        private Environment $twig,
        private QrCodeImage $image,
        #[Autowire('%kernel.cache_dir%/dompdf')]
        private string $workDir,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The sheet's HTML, before it becomes a PDF.
     */
    public function html(string $displayName, string $handle, string $shortCode, string $url, string $typeAt): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function pdf(string $displayName, string $handle, string $shortCode, string $url, string $typeAt): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
