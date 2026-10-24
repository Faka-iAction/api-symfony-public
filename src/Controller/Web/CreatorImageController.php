<?php

namespace App\Controller\Web;

use App\Block\Creator\CreatorImageBlock;
use App\Storage\StorageUnavailable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * The web form for the creator's profile image: a multipart POST with the file in `image`, or
 * `remove=1`, from the creator's profile pages. Answers with a redirect back and a message.
 */
final class CreatorImageController extends CreatorAreaController
{

    public function __construct(private readonly CreatorImageBlock $images)
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/creator/profile/image', name: 'web_creator_image', methods: [Request::METHOD_POST])]
    public function save(Request $request): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
