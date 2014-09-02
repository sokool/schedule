<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25/08/14
 * Time: 09:38
 */

namespace Schedule\Expression\Set;

use Schedule\Event\EventInterface;

/**
 * Class Intersection
 *
 * @link    http://i.stack.imgur.com/kIlCI.png
 * @package Schedule\Expression\Set
 */
class Intersection extends ExpressionSet
{
    public function includes(\DateTime $date, EventInterface $event)
    {
        if (empty($this->expressions)) {
            return false;
        }

        /** @var $expression ExpressionInterface */
        foreach ($this->expressions as $expression) {
            $includes = $expression->includes($date, $event);
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