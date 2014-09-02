<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 09:18
 */

namespace Schedule;

use Schedule\Event\EventInterface;
use Schedule\Expression\ExpressionInterface;

/**
 * Interface ScheduleInterface
 * @package Schedule
 * @codeCoverageIgnore
 */
interface ScheduleInterface
{
    /**
     * Check if on given date, there is any event
     *
     * @param \DateTime $date
     *
     * @return EventInterface[] array of EventInterface implementation
     */
    public function isOccurring(\DateTime $date);

    /**
     * Check if there is next occurrence of event, starts from given date.
     *
     * @param \DateTime $from
     *
     * @return EventInterface[] array of EventInterface implementation
     */
    public function nextOccurrence(\DateTime $from);

    /**
     * @param \DatePeriod $period
     * @param string      $format
     *
     * @return array Grouped EventInterface implementation objects
     */
    public function buildPeriod(\DatePeriod $period, $format = 'Ymd');

    /**
     * Add event to scheduler
     *
     * @param EventInterface      $event
     * @param ExpressionInterface $expression
     *
     * @return mixed
     */
    public function addEvent(EventInterface $event, ExpressionInterface $expression);
}