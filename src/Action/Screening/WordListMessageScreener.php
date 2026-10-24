<?php

namespace App\Action\Screening;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * Refuses a message that contains a configured word or phrase, without regard to case and
 * only as a whole word. A placeholder for real screening: the list comes from the
 * environment and is empty by default, which lets every message through.
 */
final readonly class WordListMessageScreener implements MessageScreener
{

    /**
     * @param string $terms comma-separated words or phrases
     */
    public function __construct(
        #[Autowire(env: 'SHOUT_OUT_SCREENING_BLOCKED_TERMS')]
        string $terms,
    ) {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function passes(string $message): bool
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
