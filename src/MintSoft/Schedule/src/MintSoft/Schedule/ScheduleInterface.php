<?php

namespace MintSoft\Schedule;

/**
 * Interface ScheduleInterface
 *
 * @package Schedule
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