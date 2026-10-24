<?php

namespace App\Controller\Web;

use App\Block\Qr\CreatorQrBlock;
use App\Entity\QrResource;
use App\Qr\QrCodeImage;
use App\Qr\QrSheet;
use App\Web\PublicUrls;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The creator's QR code: the image, downloads for print (PDF sheet, SVG, PNG), and
 * withdrawing a code that should stop working (CreatorQrBlock). The downloads are the
 * member's own and are never cached by anything in between.
 */
final class CreatorQrController extends CreatorAreaController
{
    /** Withdrawal reasons a creator can pick; the label is what the audit log records. */
    public const REASONS = [
        'misused' => 'A printed copy is being misused',
        'lost' => 'I lost control of where it is printed',
        'other' => 'Another reason',
    ];

    public function __construct(
        private readonly CreatorQrBlock $qr,
        private readonly QrCodeImage $image,
        private readonly QrSheet $sheet,
        private readonly PublicUrls $urls,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/qr', name: 'web_creator_qr', methods: [Request::METHOD_GET])]
    public function show(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/qr/code.svg', name: 'web_creator_qr_svg', methods: [Request::METHOD_GET])]
    public function svg(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/qr/code.png', name: 'web_creator_qr_png', methods: [Request::METHOD_GET])]
    public function png(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/qr/sheet.pdf', name: 'web_creator_qr_pdf', methods: [Request::METHOD_GET])]
    public function pdf(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/qr/withdraw', name: 'web_creator_qr_withdraw_confirm', methods: [Request::METHOD_GET])]
    public function confirmWithdraw(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/qr/withdraw', name: 'web_creator_qr_withdraw', methods: [Request::METHOD_POST])]
    public function withdraw(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/qr/new', name: 'web_creator_qr_issue', methods: [Request::METHOD_POST])]
    public function issue(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
