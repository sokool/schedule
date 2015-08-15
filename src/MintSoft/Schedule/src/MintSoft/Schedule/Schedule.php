<?php

namespace MintSoft\Schedule;

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
     * @param \DatePeriod $period
     * @param string      $format
     *
     * @return array Grouped EventInterface implementation objects
     */
    public function buildPeriod(\DatePeriod $period, $format = 'Ymd')
    {
        $iteration = [];
        /** @var $date \DateTime */
        foreach ($this->elements as $eventName => $element) {
            foreach ($period as $date) {
                if ($element->isOccurring($eventName, $date)) {
                    $iteration[$date->format($format)][] = $element->getEvent();
                }
            }
        }

        return $iteration;
    }
}