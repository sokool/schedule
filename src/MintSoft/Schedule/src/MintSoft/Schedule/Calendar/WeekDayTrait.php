<?php

namespace MintSoft\Schedule\Calendar;

use MintSoft\Schedule\Calendar\CalendarInterface as Calendar;
use MintSoft\Schedule\Exception\Exception;

trait WeekDayTrait
{
    private $weekDaysMap = [
        0 => Calendar::SUNDAY,
        1 => Calendar::MONDAY,
        2 => Calendar::TUESDAY,
        3 => Calendar::WEDNESDAY,
        4 => Calendar::THURSDAY,
        5 => Calendar::FRIDAY,
        6 => Calendar::SATURDAY,
    ];

    /**
     * @param  int      $weekDays
     * @param \DateTime $date
     *
     * @return bool|\Exception
     */
    protected function occurs($weekDays, \DateTime $date)
    {
        if (!$this->checkWeeks($weekDays)) {
            return new Exception('Wrong format of week days');
        }
        $dateWeekDay = $this->weekDaysMap[$date->format('w')];

        return ($weekDays | (string) $dateWeekDay) == $weekDays;
    }

    /**
     * @param  int $weekDays
     *
     * @return bool
     */
    protected function checkWeeks($weekDays)
    {
        if ($weekDays < 1 || $weekDays > array_sum($this->weekDaysMap)) {
            return false;
        }

        return true;
    }
}