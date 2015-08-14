<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 09:18
 */

namespace MintSoft\Schedule;

use MintSoft\Schedule\Event\EventInterface;
use MintSoft\Schedule\Expression\ExpressionInterface;

/**
 * Interface ScheduleInterface
 *
 * @package Schedule
 * @codeCoverageIgnore
 */
interface ScheduleInterface
{
    /**
     * Check if on given date, the given event occours
     *
     * @param \DateTime $date
     * @param string    $event
     *
     * @return bool
     */
    public function isOccurring(\DateTime $date, $event = null);

    /**
     * Check if there is next occurrence of event, starts from given date.
     *
     * @param \DateTime $from
     * @param string    $event
     *
     * @return EventInterface[] array of EventInterface implementation
     */
    public function nextOccurrence(\DateTime $from, $event = null);

    /**
     * @param \DatePeriod $period
     * @param string      $format
     *
     * @return array Grouped EventInterface implementation objects
     */
    public function buildPeriod(\DatePeriod $period, $format = 'Ymd');

    /**
     * @param Element $element
     *
     * @return $this
     */
    public function add(Element $element);
}