<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 09:14
 */

namespace MintSoft\Schedule;

use MintSoft\Schedule\Element as ScheduleElement;
use MintSoft\Schedule\Event\EventInterface;
use MintSoft\Schedule\Expression\ExpressionInterface;

/**
 * Class Schedule, implementation based on Martin Fowler abstract "Recurring Events for Calendars"
 *
 * @link    http://martinfowler.com/apsupp/recurring.pdf
 *
 * @package Schedule
 */
class Schedule implements ScheduleInterface
{
    /**
     * @var Element[]
     */
    protected $elements = [];

    /**
     * Add event to scheduler
     *
     * @param EventInterface      $event
     * @param ExpressionInterface $expression
     *
     * @return mixed
     */
    public function addEvent(EventInterface $event, ExpressionInterface $expression)
    {

        $this->elements[] = new ScheduleElement($event, $expression);

        return $this;
    }

    /**
     * Check if on given date, there is any event
     *
     * @param \DateTime $date
     *
     * @return EventInterface[] array of EventInterface implementation
     */
    public function isOccurring(\DateTime $date)
    {
        $elements = [];
        foreach ($this->elements as $elem) {
            if ($elem->isOccurring($date)) {
                $elements[] = $elem->getEvent();
            }
        }

        return $elements;
    }

    /**
     * @param \DateTime $from
     *
     * @return \DateTime|boolean
     */
    public function nextOccurrence(\DateTime $from)
    {
    }

    /**
     * @param \DatePeriod $period
     * @param string      $format
     *
     * @return array Grouped EventInterface implementation objects
     */
    public function buildPeriod(\DatePeriod $period, $format = 'Ymd')
    {
        $iteration = [];

        /** @var $date \DateTime */
        foreach ($period as $date) {
            $elements = $this->isOccurring($date);
            if (!empty($elements)) {
                $iteration[$date->format($format)] = $elements;
            }
        }

        return $iteration;
    }
}