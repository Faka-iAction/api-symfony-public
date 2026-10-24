<?php

namespace App\Controller\Admin;

use App\Admin\AdminNavigation;
use App\Admin\RequiresAdminRole;
use App\Block\Audit\AuditActor;
use App\Block\Country\CountryConfigResolver;
use App\Block\Country\CountryConfigurationBlock;
use App\Block\Country\CountryPolicyException;
use App\Country\ConfigField;
use App\Country\FieldType;
use App\Entity\Country;
use App\Repository\CountryRepository;
use Psr\Clock\ClockInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Country configuration (architecture 16 and 16.2): the effective value of every field for a
 * country, with the layer that supplied it and the resolver's explanation, for
 * ADMIN_SUPPORT and ADMIN_OPERATIONS; a change, for ADMIN_OPERATIONS only.
 *
 * A change goes through CountryConfigurationBlock (validated, a new version, effective-dated,
 * audited and evented) in two steps: the form, then a confirmation page that shows the value
 * now in effect, the new value and when it takes effect; only the confirmation's POST
 * writes. A reason is mandatory.
 *
 * Mandatory policy cannot be removed here: there is no delete, an end date is not offered
 * for a mandatory field and is refused if one is sent, and a value must pass the field's
 * validation (so it cannot be emptied). Fields held on the country record are not changed
 * here.
 */
final class CountryConfigurationController extends AdminController
{

    public function __construct(
        private readonly CountryConfigResolver $resolver,
        private readonly CountryConfigurationBlock $configuration,
        private readonly CountryRepository $countries,
        private readonly ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/countries', name: 'admin_countries', methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::COUNTRIES_READ)]
    public function list(): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/countries/{code}', name: 'admin_country', requirements: ['code' => '[A-Z]{2}'], methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::COUNTRIES_READ)]
    public function show(string $code): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/countries/{code}/{key}', name: 'admin_country_change_form', requirements: ['code' => '[A-Z]{2}', 'key' => '[a-z0-9_.]{3,120}'], methods: [Request::METHOD_GET])]
    #[RequiresAdminRole(AdminNavigation::COUNTRIES_CHANGE)]
    public function changeForm(string $code, string $key): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The form's POST: checks everything and shows the confirmation. Nothing is written.
     */
    #[Route('/admin/countries/{code}/{key}', name: 'admin_country_change_check', requirements: ['code' => '[A-Z]{2}', 'key' => '[a-z0-9_.]{3,120}'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::COUNTRIES_CHANGE)]
    public function check(string $code, string $key, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/admin/countries/{code}/{key}/confirm', name: 'admin_country_change_confirm', requirements: ['code' => '[A-Z]{2}', 'key' => '[a-z0-9_.]{3,120}'], methods: [Request::METHOD_POST])]
    #[RequiresAdminRole(AdminNavigation::COUNTRIES_CHANGE)]
    public function confirm(string $code, string $key, Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
