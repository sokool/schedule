<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 09:33
 */

namespace MintSoft\Schedule\Expression;

use MintSoft\Schedule\Calendar\Weeks;
use MintSoft\Schedule\Event\EventInterface;

/**
 * Class DayInWeek
 * @package Schedule\Expression
 */
class DayInWeek implements ExpressionInterface
{
    /**
     * @param \DateTime $date
     * @param EventInterface $event
     * @return bool
     */
    public function includes(\DateTime $date, EventInterface $event)
    {
        $dateWeekDay   = new Weeks(Weeks::phpToBinary($date->format('w')));
        $eventWeekDays = $event->getWeekDays();

        return (boolean) $eventWeekDays->isContain($dateWeekDay);
    }
}