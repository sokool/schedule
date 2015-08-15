<?php
namespace MintSoft\Schedule\Expression;

use MintSoft\Schedule\Calendar\WeekDayTrait;

/**
 * Class WeekDay
 *
 * @package Schedule\Expression
 */
class WeekDay implements ExpressionInterface
{
    use WeekDayTrait;

    /**
     * @var
     */
    protected $weekDays;

    /**
     * @param int|int[] $weekDays
     *
     * @throws \Exception
     */
    public function __construct($weekDays)
    {
        $weekDays = is_array($weekDays) ? array_sum($weekDays) : $weekDays;
        if (!$this->checkWeeks((int) $weekDays)) {
            throw new \Exception('Wrong format of week');
        }

        $this->weekDays = $weekDays;
    }

    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    public function includes(\DateTime $date)
    {
        return $this->occurs($this->weekDays, $date);
    }
}