<?php

namespace App\Controller\Api;

use App\Api\Problem\ApiProblemException;
use App\Api\Problem\ErrorCode;
use App\Api\Problem\FieldError;
use App\Api\Problem\FieldErrorCode;
use App\Api\Request\RequestReader;
use App\Api\Response\ApiResponse;
use App\Api\Response\CreatorPresenter;
use App\Block\Creator\CreatorImageBlock;
use App\Block\Creator\CreatorProfileBlock;
use App\Security\AuthenticatedMember;
use App\Storage\StorageUnavailable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * The signed-in creator's profile image (contract alpha.5): the image itself as the request body
 * (image/jpeg, image/png or image/webp), stored through CreatorImageBlock; or removed.
 */
final class CreatorImageController
{
    public function __construct(
        private readonly RequestReader $reader,
        private readonly CreatorImageBlock $images,
        private readonly CreatorProfileBlock $creatorProfiles,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile/image', name: 'api_v1_put_own_creator_image', methods: [Request::METHOD_PUT])]
    public function putOwnCreatorImage(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    #[Route('/api/v1/me/creator-profile/image', name: 'api_v1_delete_own_creator_image', methods: [Request::METHOD_DELETE])]
    public function deleteOwnCreatorImage(Request $request, #[CurrentUser] AuthenticatedMember $caller): Response
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
