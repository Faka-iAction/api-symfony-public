<?php

namespace App\Controller\Web;

use App\Block\Creator\CreatorException;
use App\Block\Qr\QrResolverBlock;
use App\Block\Qr\QrStatus;
use App\Web\PublicUrls;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * A scanned code (architecture 9): resolved by the same Block as the API's resolveQr, then
 * a temporary redirect to the canonical page, so a code keeps working after a rename.
 *
 * A code that does not lead anywhere shows the neutral page and never redirects anywhere
 * else (state-machines.md 14.2): 410 for a code withdrawn for good (revoked, or a broken
 * replacement chain, which the Block reports as revoked), 404 for an unknown code and for
 * one that may work again (not activated, suspended, expired, or a hidden destination).
 */
final class QrController extends WebController
{
    #[Route('/q/{qrId}', name: 'web_qr', requirements: ['qrId' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function __invoke(string $qrId, QrResolverBlock $qr): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
