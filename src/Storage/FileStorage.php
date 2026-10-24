<?php

namespace App\Storage;

use App\Config\PlatformSettings;
use Aws\S3\S3Client;
use Google\Cloud\Storage\StorageClient;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use League\Flysystem\GoogleCloudStorage\GoogleCloudStorageAdapter;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Where uploaded files are kept: the server's own disk, an AWS S3 bucket or a Google Cloud Storage
 * bucket (item 13 of 2026-10-24, after EasyApply's Util/Storage: LocalFileSystem, Aws, Google).
 * One Flysystem interface over the same SDKs EasyApply uses.
 *
 * The provider and its settings come from the platform settings (FILE_STORAGE_*; operators may
 * override them, secrets stored encrypted), so switching needs no release. Changing the provider
 * does not move files already stored. `local` keeps files under var/share/uploads, which a deploy
 * links to the shared directory, so they outlive releases (deploy/activate-release.sh).
 *
 * Files are never served from the bucket directly: the web and the app read them through
 * /media/{key} (MediaController), so the pages keep their 'self'-only Content-Security-Policy and
 * every image comes from FAKA's own host (zero-rated data works per host name). Buckets stay
 * private.
 *
 * Unlike EasyApply, nothing is built at boot: a missing or wrong provider setting fails only the
 * operation that needs storage, with StorageUnavailable.
 */
class FileStorage
{
    public const LOCAL = 'local';
    public const AWS = 'aws';
    public const GOOGLE = 'google';

    public function __construct(
        private readonly PlatformSettings $settings,
        #[Autowire('%kernel.project_dir%/var/share/uploads')]
        private readonly string $localRoot,
        #[Autowire(env: 'default::FILE_STORAGE_PROVIDER')]
        private readonly ?string $provider = null,
        #[Autowire(env: 'default::FILE_STORAGE_BUCKET')]
        private readonly ?string $bucket = null,
        #[Autowire(env: 'default::FILE_STORAGE_AWS_REGION')]
        private readonly ?string $awsRegion = null,
        #[Autowire(env: 'default::FILE_STORAGE_AWS_KEY_ID')]
        private readonly ?string $awsKeyId = null,
        #[Autowire(env: 'default::FILE_STORAGE_AWS_SECRET')]
        #[\SensitiveParameter]
        private readonly ?string $awsSecret = null,
        #[Autowire(env: 'default::FILE_STORAGE_GOOGLE_CREDENTIALS')]
        #[\SensitiveParameter]
        private readonly ?string $googleCredentials = null,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function provider(): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws StorageUnavailable
     */
    public function write(string $key, string $contents, string $mimeType): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws StorageUnavailable
     */
    public function read(string $key): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function exists(string $key): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Never fails: a file that cannot be deleted now is left behind, not an error for the member.
     */
    public function delete(string $key): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
