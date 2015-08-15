<?php

namespace MintSoft\Schedule\Expression\Set;

/**
 * Class Union
 *
 * @link    http://i.stack.imgur.com/kIlCI.png
 * @package Schedule\Expression\Set
 */
class Union extends ExpressionSet
{
    public function includes(\DateTime $date)
    {
        foreach ($this->expressions as $expression) {
            $includes = $expression->includes($date);
            if (!is_bool($includes)) {
                throw new \InvalidArgumentException(sprintf('%s expression type should return boolean value', get_class($expression)));
            }

            if ($includes) {
                return true;
            }
        }

        return false;
    }
}