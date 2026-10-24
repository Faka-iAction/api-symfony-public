<?php

namespace App\Doctrine;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\TokenType;

/**
 * DQL `FULLTEXT_MATCH(p.a, p.b, ..., :query)`, MySQL's `MATCH (a, b, ...) AGAINST (? IN
 * BOOLEAN MODE)`: the relevance of the row, above 0 when it matches. The columns must be
 * exactly those of one FULLTEXT index. MySQL only; CreatorProfileRepository uses it only there.
 */
final class FullTextMatch extends FunctionNode
{
    public const NAME = 'FULLTEXT_MATCH';

    public function parse(Parser $parser): void
    {
        throw new \LogicException('Not published: the implementation is private.');
    }

    public function getSql(SqlWalker $sqlWalker): string
    {
        throw new \LogicException('Not published: the implementation is private.');
    }
}
