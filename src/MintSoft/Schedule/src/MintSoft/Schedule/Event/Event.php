<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 09:17
 */

namespace MintSoft\Schedule\Event;

use MintSoft\Schedule\Calendar\Weeks;

/**
 * Class Event
 *
 * @package Schedule\Event
 */
class Event implements EventInterface
{
    protected $start;
    protected $end;
    protected $weekDays;
    protected $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->start    = new \DateTime('2014-08-01');
        $this->end      = new \DateTime('2014-09-01');
        $this->weekDays = new Weeks(Weeks::SATURDAY | Weeks::SUNDAY);
        $this->name     = $name;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return Weeks
     */
    public function getWeekDays()
    {
        return $this->weekDays;
    }

    /**
     * @param Weeks $weekDays
     */
    public function setWeekDays($weekDays)
    {
        $this->weekDays = $weekDays;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->start;
    }

    /**
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->end;
    }

}