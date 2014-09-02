<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 26/08/14
 * Time: 08:46
 */

namespace ScheduleTest\Asset;

use Schedule\Calendar\Weeks;
use Schedule\Event\EventInterface;

class ScheduleEvent implements EventInterface
{
    protected $fromDate;
    protected $toDate;
    protected $weekDays;

    /**
     * @param mixed $fromDate
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    /**
     * @return mixed
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @param mixed $toDate
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    /**
     * @return mixed
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * @param mixed $weekDays
     */
    public function setWeekDays($weekDays)
    {
        $this->weekDays = $weekDays;
    }

    /**
     * @return mixed
     */
    public function getWeekDays()
    {
        return $this->weekDays;
    }
}