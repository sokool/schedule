<?php

namespace MintSoft\Schedule\Expression;

class EeachDay implements ExpressionInterface
{
    /** @var \DateTime */
    protected $start;

    /** @var \DateTime */
    protected $days;

    /**
     * @param \DateTime $start
     * @param int       $days
     */
    public function __construct(\DateTime $start, $days)
    {
        $this->start = $start;
        $this->days  = $days;
    }

    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    public function includes(\DateTime $date)
    {
        $interval = $this->start->diff($date);
        if ($interval->invert) {
            return false;
        }

        return ($interval->days % $this->days) === 0;
    }

}