<?php

namespace MintSoft\Schedule\Expression;

use MintSoft\Schedule\Exception\Exception;
use MintSoft\Schedule\Expression\ExpressionInterface as Expression;

trait ExpressionGuardTrait
{
    /**
     * @param ExpressionInterface $expression
     * @param \DateTime           $date
     *
     * @return bool
     * @throws Exception when Expression::includes return different value than boolean
     */
    protected function expressionValue(Expression $expression, \DateTime $date)
    {
        $value = $expression->includes($date);
        if (!is_bool($value)) {
            throw new Exception(sprintf('%s expression type should return boolean value', get_class($expression)));
        }

        return $value;
    }

}