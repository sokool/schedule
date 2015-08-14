<?php

namespace MintSoft\Schedule\Expression;

/**
 * Class DateRange
 *
 */
class DateRange implements ExpressionInterface
{
    /**
     * @var \DateTime
     */
    protected $start;
    /**
     * @var \DateTime
     */
    protected $end;

    /**
     * @param \DateTime $start
     * @param \DateTime $end
     */
    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    public function includes(\DateTime $date)
    {
        return ($date >= $this->start && $this->end >= $date);
    }
}