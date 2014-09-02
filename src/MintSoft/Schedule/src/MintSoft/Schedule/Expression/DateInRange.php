<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 10:51
 */

namespace Schedule\Expression;

use Schedule\Event\EventInterface;

/**
 * Class DateInRange
 * @package Schedule\Expression
 */
class DateInRange implements ExpressionInterface
{
    /**
     * @param \DateTime $date
     * @param EventInterface $event
     * @return bool
     */
    public function includes(\DateTime $date, EventInterface $event)
    {
        $startDate = $event->getFromDate();
        $endDate   = $event->getToDate();

        return ($date >= $startDate && $endDate >= $date);
    }
}