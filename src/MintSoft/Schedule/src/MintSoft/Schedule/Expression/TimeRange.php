<?php

namespace MintSoft\Schedule\Expression;

class TimeRange implements ExpressionInterface
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
        $startTime = $this->start->format('H:i:s.u');
        $endTime   = $this->end->format('H:i:s.u');
        $dateTime  = $date->format('H:i:s.u');

        return ($dateTime >= $startTime && $endTime >= $dateTime);
    }

}