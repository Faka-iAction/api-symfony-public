<?php

namespace App\Controller\Web;

use App\Storage\FileStorage;
use App\Storage\StorageUnavailable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Serves stored files to the web and the app from FAKA's own host, whatever the storage
 * provider (FileStorage): pages keep their 'self'-only Content-Security-Policy, buckets stay
 * private, and zero-rated data works because every image comes from one host name.
 *
 * Only public media is served: creator images (creators/…). A key is random and its content never
 * changes (a new image gets a new key), so it is cached publicly for a year.
 */
final class MediaController extends WebController
{
    #[Route('/media/{key}', name: 'web_media', requirements: ['key' => 'creators/[a-f0-9]{32}\.jpg'], methods: [Request::METHOD_GET])]
    public function __invoke(string $key, FileStorage $storage): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
