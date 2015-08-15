<?php

namespace MintSoft\Schedule\Expression\Interpreter;

use MintSoft\Schedule\Expression\ExpressionGuardTrait;

/**
 * Class Union
 *
 * @link    http://i.stack.imgur.com/kIlCI.png
 * @package Schedule\Expression\Interpreter
 */
class Union extends ExpressionSet
{
    use ExpressionGuardTrait;

    public function includes(\DateTime $date)
    {
        foreach ($this->expressions as $expression) {
            if ($this->expressionValue($expression, $date)) {
                return true;
            }
        }

        return false;
    }
}