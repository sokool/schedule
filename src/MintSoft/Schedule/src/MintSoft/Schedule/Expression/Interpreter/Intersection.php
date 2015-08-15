<?php

namespace MintSoft\Schedule\Expression\Interpreter;

use MintSoft\Schedule\Expression\ExpressionGuardTrait;

/**
 * Class Intersection
 *
 * @link    http://i.stack.imgur.com/kIlCI.png
 * @package Schedule\Expression\Interpreter
 */
class Intersection extends ExpressionSet
{
    use ExpressionGuardTrait;

    public function includes(\DateTime $date)
    {
        foreach ($this->expressions as $expression) {
            if (!$this->expressionValue($expression, $date)) {
                return false;
            }
        }

        return true;
    }
}