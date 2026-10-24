<?php

namespace App\Creator;

/**
 * Every creator-profile value that the contract and the product decisions have not fixed
 * yet, in one place. Each is the provisional value the contract states
 * (CONVENTIONS.md section 14, items 16, 18, 24, 25 and 31); none is a decision.
 */
final class CreatorDefaults
{
    /** Item 16: length 3 to 30, characters a-z 0-9 _, compared without regard to case. */
    public const HANDLE_MIN_LENGTH = 3;
    public const HANDLE_MAX_LENGTH = 30;
    public const HANDLE_PATTERN = '/^[a-z0-9_]+$/D';

    /** Item 24: all maximum lengths and counts are provisional. */
    public const DISPLAY_NAME_MAX_LENGTH = 80;
    public const BIO_MAX_LENGTH = 500;
    public const CITY_MAX_LENGTH = 100;
    public const LANGUAGES_MAX = 10;
    public const LINKS_MAX = 20;
    public const LINK_LABEL_MAX_LENGTH = 50;
    public const LINK_URL_MAX_LENGTH = 2048;

    /** Item 25: the link types of the contract's CreatorLink. */
    public const LINK_TYPE_SOCIAL = 'social';
    public const LINK_TYPE_LIVESTREAM = 'livestream';
    public const LINK_TYPES = [self::LINK_TYPE_SOCIAL, self::LINK_TYPE_LIVESTREAM];

    /** The contract's CategoryCode schema. */
    public const CATEGORY_CODE_MAX_LENGTH = 50;
    public const CATEGORY_CODE_PATTERN = '/^[a-z0-9_\-]+$/D';

    /**
     * Item 18 and architecture 3.1 ("potential categories"): code => translation key.
     * Categories are platform configuration held in `creator_categories`; this list is
     * only what the migration seeds, and the test database with it.
     */
    public const CATEGORIES = [
        'dj' => 'creator_category.dj',
        'musician' => 'creator_category.musician',
        'band' => 'creator_category.band',
        'radio_presenter' => 'creator_category.radio_presenter',
        'livestreamer' => 'creator_category.livestreamer',
        'youtuber' => 'creator_category.youtuber',
        'tiktok_creator' => 'creator_category.tiktok_creator',
        'streamer' => 'creator_category.streamer',
        'podcaster' => 'creator_category.podcaster',
        'gamer' => 'creator_category.gamer',
        'artist' => 'creator_category.artist',
        'educator' => 'creator_category.educator',
        'fitness' => 'creator_category.fitness',
        'cooking' => 'creator_category.cooking',
        'event_host' => 'creator_category.event_host',
        'other' => 'creator_category.other',
    ];

    /**
     * Item 31: the length and alphabet of a QR identifier are not specified. Ten
     * characters without the look-alikes 0 O I l 1, about 58 random bits.
     */
    public const QR_CODE_LENGTH = 10;
    public const QR_CODE_ALPHABET = '23456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    /** What a QR identifier can look like at all; anything else is unknown without a lookup. */
    public const QR_CODE_PATTERN = '/^[A-Za-z0-9]{1,16}$/D';

    /** Search: the contract's limits for `q` and `city`. */
    public const SEARCH_TEXT_MAX_LENGTH = 100;
}
