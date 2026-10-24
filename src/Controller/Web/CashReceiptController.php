<?php

namespace App\Controller\Web;

use App\Action\Money;
use App\Api\Request\CashRequests;
use App\Block\Action\ActionException;
use App\Block\Action\ActionFailure;
use App\Block\Idempotency\IdempotencyBlock;
use App\Block\Idempotency\IdempotencyException;
use App\Block\Payment\CashBlock;
use App\Entity\CashReceipt;
use App\Twig\WebExtension;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Cash paid in person, as the creator sees it (architecture 12.5.3 and 12.5.3.1): the list of
 * cash reports (`/creator/cash`) and, for each, a confirmation page (`/creator/cash/{id}`)
 * where the creator confirms that they received the cash, says that they did not, or corrects
 * a confirmation made by mistake. The same Block as the API's cash operations (CashBlock),
 * which allows only the member who owns the self-managed profile. Another creator's receipt
 * is the same not-found page as one that does not exist.
 *
 * Confirming makes the creator restate the amount they received, as the API does; a different
 * amount is refused, and nothing is confirmed. A correction never changes the original: it is
 * a new record, shown with the original.
 */
final class CashReceiptController extends CreatorAreaController
{

    public function __construct(
        private readonly CashBlock $cash,
        private readonly IdempotencyBlock $idempotency,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/cash', name: 'web_creator_cash', methods: [Request::METHOD_GET])]
    public function list(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/cash/{receiptId}', name: 'web_creator_cash_receipt', requirements: ['receiptId' => '[^/]+'], methods: [Request::METHOD_GET])]
    public function show(string $receiptId): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/cash/{receiptId}/{decision}', name: 'web_creator_cash_decide', requirements: ['receiptId' => '[^/]+', 'decision' => 'confirm|void|correct'], methods: [Request::METHOD_POST])]
    public function decide(string $receiptId, string $decision, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
