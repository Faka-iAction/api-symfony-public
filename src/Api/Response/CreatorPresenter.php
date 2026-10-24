<?php

namespace App\Api\Response;

use App\Block\Creator\CreatorPage;
use App\Block\Creator\CreatorView;
use App\Block\Creator\FollowedCreator;
use App\Block\Creator\FollowPage;
use App\Block\Creator\PublicCreator;
use App\Block\Qr\QrResolution;
use App\Block\Qr\QrStatus;
use App\Entity\CreatorPublicLink;

/**
 * The response shapes of the creator profile, discovery, follow and QR operations,
 * field for field as the contract's schemas list them.
 *
 * The public projections (PublicCreatorSummary, PublicCreatorProfile, QrResolution,
 * QrDestination) are allowlists: each is built from scratch here, never by removing
 * fields from the private shape, so that a field added to a profile cannot leak.
 */
final class CreatorPresenter
{

    /**
     * Schema: CreatorProfile. The owner's own view.
     *
     * @return array<string, mixed>
     */
    public static function own(CreatorView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PublicCreatorProfile.
     *
     * @return array<string, mixed>
     */
    public static function publicProfile(PublicCreator $creator): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PublicCreatorSummary.
     *
     * @return array<string, mixed>
     */
    public static function summary(CreatorView $view): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: PublicCreatorPage.
     *
     * @return array<string, mixed>
     */
    public static function page(CreatorPage $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schema: FollowedCreatorPage.
     *
     * @return array<string, mixed>
     */
    public static function followPage(FollowPage $page): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * Schemas: QrResolution and QrDestination. A destination only while the code is active.
     *
     * @return array<string, mixed>
     */
    public static function qr(QrResolution $resolution): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
