<?php

namespace App\Controller\Webhook;

use App\Block\Payment\ProviderNotificationInbox;
use App\Payment\Message\ProcessProviderNotification;
use App\Payment\Provider\InvalidSignature;
use App\Payment\Provider\ProviderNotConfigured;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Paystack's notification endpoint, outside the client contract (CONVENTIONS.md 13.2 and
 * 14: "provider notification endpoints are provider-specific and signed").
 *
 * - The signature is checked over the raw body before anything is read. A bad one is 401
 *   and nothing is stored.
 * - Without a key configured nothing can be checked: 503, nothing stored, and the provider
 *   retries later.
 * - A good one is stored durably (ProviderNotificationInbox::receive()) and only then
 *   answered 200. If storing fails, the answer is an error and the provider retries: a
 *   notification is never acknowledged without being stored.
 * - Processing is handed to a worker after the answer is decided; its failure is the
 *   inbox's to retry and never changes this answer.
 */
final class PaystackWebhookController
{
    public function __construct(
        private readonly ProviderNotificationInbox $inbox,
        private readonly MessageBusInterface $bus,
        private readonly LoggerInterface $logger,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/webhooks/paystack', name: 'webhook_paystack', methods: [Request::METHOD_POST])]
    public function __invoke(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
