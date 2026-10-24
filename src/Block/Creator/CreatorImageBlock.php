<?php

namespace App\Block\Creator;

use App\Entity\Member;
use App\Storage\FileStorage;
use App\Storage\StorageUnavailable;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * The creator's profile image (the first upload flow, item 13 of 2026-10-24).
 *
 * The uploaded file is checked to be a JPEG, PNG or WebP image of at most MAX_BYTES, then drawn
 * again with GD into a JPEG of at most MAX_SIDE pixels a side. Drawing it again drops whatever the
 * file carried besides the picture (EXIF and location data, scripts in a disguised file) and makes
 * every stored image the same safe type. The previous image is deleted once the new one is saved.
 *
 * Keys are random (creators/{random}.jpg), never the file name the member uploaded.
 */
final readonly class CreatorImageBlock
{
    public const MAX_BYTES = 5 * 1024 * 1024;
    public const MAX_SIDE = 1024;

    public function __construct(
        private CreatorProfileBlock $creatorProfiles,
        private FileStorage $storage,
        private EntityManagerInterface $entityManager,
        private ClockInterface $clock,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @param string $contents the uploaded file's bytes
     *
     * @throws CreatorException PROFILE_NOT_FOUND
     * @throws \DomainException    not an accepted image, or too large (the message says which)
     * @throws StorageUnavailable  the file could not be stored
     */
    public function replace(Member $member, string $contents): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws CreatorException PROFILE_NOT_FOUND
     */
    public function remove(Member $member): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * @throws \DomainException
     */
    public static function normalise(string $contents): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
