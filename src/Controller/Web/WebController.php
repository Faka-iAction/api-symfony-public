<?php

namespace App\Controller\Web;

use App\Block\Country\CountryPolicyException;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * What the public web controllers share: rendering a page with the right caching and
 * indexing headers, and the one neutral "not here" page.
 */
abstract class WebController extends AbstractController
{
    /** What a page says when the country's mandatory policy cannot be resolved. */
    protected const POLICY_UNAVAILABLE = 'This cannot be done right now. Nothing was saved. Please try again later.';

    #[Required]
    public function setWebLogger(LoggerInterface $logger): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Country policy that cannot be resolved (missing or invalid mandatory policy) refuses
     * the operation, fail safe, as the API does with 503 SERVICE_UNAVAILABLE. The cause is
     * an operator's to fix: it is logged with the country and the field, and the page only
     * says that it cannot be done now.
     */
    protected function logPolicyUnavailable(CountryPolicyException $refused): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
    /**
     * @param array<string, mixed> $parameters
     * @param bool                 $private    the page shows something for this visitor only, or a
     *                                         one-time form key: never stored by any cache
     */
    protected function page(string $template, array $parameters, int $status = Response::HTTP_OK, bool $noindex = false, bool $private = false): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The same plain page for everything that is not here: unknown, hidden, suspended or
     * withdrawn. It never says which, and it never sends the visitor somewhere else.
     *
     * @param int $status 404, or 410 for something withdrawn for good
     */
    protected function notFound(int $status = Response::HTTP_NOT_FOUND): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
