<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 26/08/14
 * Time: 08:49
 */

namespace ScheduleTest\Asset\Expression;

use Schedule\Event\EventInterface;
use Schedule\Expression\Set\ExpressionSet;

class NoneExpressionSet extends ExpressionSet
{
    /**
     * @param \DateTime      $date
     * @param EventInterface $event
     *
     * @return mixed
     */
    public function includes(\DateTime $date, EventInterface $event)
    {
        // TODO: Implement includes() method.
    }
}