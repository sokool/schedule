<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 11:49
 */

namespace MintSoft\Schedule\Calendar;

class Weeks
{
    /**
     * Binary values of each day of week
     */
    const
        NODAY      = 0b0000000,
        MONDAY     = 0b0000001,
        TUESDAY    = 0b0000010,
        WEDNESDAY  = 0b0000100,
        THURSDAY   = 0b0001000,
        FRIDAY     = 0b0010000,
        SATURDAY   = 0b0100000,
        SUNDAY     = 0b1000000,
        WHOLE_WEEK = 0b1111111;

    /**
     * Representation of day of week as integer value.
     *
     * @var int|number
     */
    protected $value;

    public static $phpWeekDaysMap = [
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
     */
    public function __construct($weeks = self::WHOLE_WEEK)
    {
        $this->value = is_array($weeks) ? array_sum($weeks) : $weeks;
    }

    /**
     * @param $phpWeekDay
     *
     * @return int
     */
    public static function phpToBinary($phpWeekDay)
    {
        if (array_key_exists($phpWeekDay, self::$phpWeekDaysMap)) {
            return self::$phpWeekDaysMap[$phpWeekDay];
        }

        return self::NODAY;
    }

    /**
     * @return int|number
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Example:<br><br>
     * $weekA = [mon, fri, sun], $weekB = [mon, fri] then $weekB->isCovered($weekA) => TRUE <br>
     *
     * @param Weeks $weeks
     *
     * @return bool
     */
    public function isCovered($weeks)
    {
        return ($this->value & (string) $weeks) == $this->value;
    }

    /**
     * Example:<br>
     * $weekA = [mon, fri, sun]; $weekB = [mon, fri]; then $weekB->isContain($weekA) => FALSE <br>
     *
     * @param Weeks $weeks
     *
     * @return bool
     */
    public function isContain($weeks)
    {
        return ($this->value | (string) $weeks) == $this->value;
    }

    /**
     * Convert Weeks object value to PHP weeks array. <br><br>
     * Example: <br>
     *
     * $weeksD = new Weeks(Weeks::SATURDAY| Weeks::THURSDAY); <br>
     * then $weeksD = [4 => 'Thu', 6 => 'Sat'];<br>
     *
     * where: 4 and 6 index is php week day number.
     *
     * @return array
     */
    public function toPHPArray()
    {
        $out = [];
        foreach (self::$phpWeekDaysMap as $weekDay => $binaryWeekDay) {
            if (($binaryWeekDay & $this->value) == $binaryWeekDay) {
                $out[$weekDay] = (new \DateTime('Sunday + ' . $weekDay . ' days'))->format('D');
            }
        }

        return $out;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}