<?php

namespace App\Creator;

/**
 * The free text of a creator search, split into the words a profile must all contain.
 *
 * On MySQL, a word goes to the full-text index on handle, display name and bio (domain model
 * 5.6) as a prefix (`+word*`). The index skips words below innodb_ft_min_token_size (3 by
 * default) and InnoDB's default stopwords, so those words are matched with LIKE instead:
 * "DJ" must still find DJs. On other databases every word uses LIKE.
 */
final readonly class CreatorSearchText
{
    /** Words beyond this are ignored, which bounds the query. */
    public const MAX_WORDS = 8;

    public static function fromTyped(string $text): self
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function isEmpty(): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The words the full-text index can answer, as one BOOLEAN MODE query in which every word
     * is required and may be a prefix; null when there is none. The words hold letters,
     * digits and underscores only, so no boolean operator can come from the visitor.
     */
    public function fullTextQuery(): ?string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    /**
     * The words the full-text index cannot answer.
     *
     * @return list<string>
     */
    public function wordsOutsideTheIndex(): array
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
