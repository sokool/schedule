<?php
namespace MintSoft\Schedule\Expression;

use MintSoft\Schedule\Calendar\Weeks;

/**
 * Class WeekDay
 *
 * @package Schedule\Expression
 */
class WeekDay implements ExpressionInterface
{
    /**
     * Binary values of each day of week
     */
    const
        MONDAY = 0b0000001,
        TUESDAY = 0b0000010,
        WEDNESDAY = 0b0000100,
        THURSDAY = 0b0001000,
        FRIDAY = 0b0010000,
        SATURDAY = 0b0100000,
        SUNDAY = 0b1000000;

    private $phpWeekDaysMap = [
        0 => self::SUNDAY,
        1 => self::MONDAY,
        2 => self::TUESDAY,
        3 => self::WEDNESDAY,
        4 => self::THURSDAY,
        5 => self::FRIDAY,
        6 => self::SATURDAY,
    ];

    /**
     * @param int $weeks
     *
     * @throws \Exception
     */
    public function __construct($weeks)
    {
        $weeks = is_array($weeks) ? array_sum($weeks) : $weeks;
        if ($weeks < 1 || $weeks > array_sum($this->phpWeekDaysMap)) {
            throw new \Exception('Wrong format of week');
        }

        $this->value = $weeks;
    }

    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    public function includes(\DateTime $date)
    {
        $dateWeekDay = $this->phpWeekDaysMap[$date->format('w')];

        return ($this->value | (string) $dateWeekDay) == $this->value;
    }
}