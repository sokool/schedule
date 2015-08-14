<?php

namespace MintSoft\Schedule;

use MintSoft\Schedule\Event\EventInterface;

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
     * @param Element $element
     *
     * @return $this
     */
    public function add(Element $element)
    {
        $this->elements[$element->getEvent()] = $element;

        return $this;
    }

    /**
     * Check if on given date, the given event occours
     *
     * @param \DateTime $date
     * @param string    $event
     *
     * @return bool
     */
    public function isOccurring(\DateTime $date, $event = null)
    {
        foreach ($this->elements as $eventName => $element) {
            if ($element->isOccurring($eventName, $date)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if there is next occurrence of event, starts from given date.
     *
     * @param \DateTime $from
     * @param string    $event
     *
     * @return EventInterface[] array of EventInterface implementation
     */
    public function nextOccurrence(\DateTime $from, $event = null)
    {
        // TODO: Implement nextOccurrence() method.
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
        $z         = 0;
        /** @var $date \DateTime */

        //print_r($date);
        foreach ($this->elements as $eventName => $element) {
            foreach ($period as $date) {
                if ($element->isOccurring($eventName, $date)) {
                    $iteration[$date->format($format)][] = $element;
                }
                $z++;
            }
            $z++;
        }
        echo $z . PHP_EOL;

        return $iteration;
    }
}