<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Payment\PaymentGatewayBlock;
use App\Config\PlatformSettingDefinitions;
use App\Config\PlatformSettings;
use App\Entity\PaymentGateway;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Configuration operators change without a release (product owner, 2026-10-24; ADR-040):
 *
 * - Platform settings: the settings of PlatformSettingDefinitions, each showing the value the
 *   environment gives and the override if any; an override can be set or removed.
 * - Payment gateways: the Paystack account per country. A secret key is never shown again,
 *   only whether one is set; leaving the field empty keeps it.
 *
 * ADMIN_OPERATIONS only; every change is audited without secret values.
 */
final class ConfigurationController extends AdminController
{
    public function __construct(
        private readonly PlatformSettings $settings,
        private readonly PaymentGatewayBlock $gateways,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/platform', name: 'admin_platform', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::CONFIGURE)]
    public function platform(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/platform/{name}', name: 'admin_platform_set', requirements: ['name' => '[A-Z0-9_]{1,80}'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::CONFIGURE)]
    public function set(string $name, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/payment-gateways', name: 'admin_gateways', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::CONFIGURE)]
    public function gateways(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/payment-gateways/{provider}/{country}', name: 'admin_gateway_save', requirements: ['provider' => '[a-z]{2,30}', 'country' => '[A-Z]{2}'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::CONFIGURE)]
    public function saveGateway(string $provider, string $country, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
