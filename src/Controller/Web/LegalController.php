<?php

namespace App\Controller\Web;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The legal documents (ui-spec 8.12, screenshot 54). The final texts are not written yet,
 * so each page says it is a placeholder. Public: anyone may read them.
 */
final class LegalController extends WebController
{
    public const DOCUMENTS = ['terms' => 'Terms and conditions', 'disclaimer' => 'Disclaimer', 'privacy' => 'Privacy policy'];

    #[Route('/legal/{id}', name: 'web_legal', requirements: ['id' => 'terms|disclaimer|privacy'], methods: ['GET'])]
    public function __invoke(string $id): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
