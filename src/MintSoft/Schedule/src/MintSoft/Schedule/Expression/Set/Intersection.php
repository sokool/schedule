<?php

namespace MintSoft\Schedule\Expression\Set;

use MintSoft\Schedule\Expression\ExpressionInterface;

/**
 * Class Intersection
 *
 * @link    http://i.stack.imgur.com/kIlCI.png
 * @package Schedule\Expression\Set
 */
class Intersection extends ExpressionSet
{
    public function includes(\DateTime $date)
    {
        if (empty($this->expressions)) {
            return false;
        }

        /** @var $expression ExpressionInterface */
        foreach ($this->expressions as $expression) {
            $includes = $expression->includes($date);
            if (!is_bool($includes)) {
                throw new \InvalidArgumentException(sprintf('%s expression type should return boolean value', get_class($expression)));
            }

            if (!$includes) {
                return false;
            }
        }

        return true;
    }
}