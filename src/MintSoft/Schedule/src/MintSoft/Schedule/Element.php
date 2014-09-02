<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25/08/14
 * Time: 10:49
 */

namespace Schedule;

use Schedule\Event\EventInterface;
use Schedule\Expression\ExpressionInterface;

class Element
{
    protected $event;
    protected $expression;

    public function __construct(EventInterface $event, ExpressionInterface $expression)
    {
        $this->event      = $event;
        $this->expression = $expression;
    }

    /**
     * @param \Schedule\Event\EventInterface $event
     */
    public function setEvent(EventInterface $event)
    {
        $this->event = $event;
    }

    /**
     * @return \Schedule\Event\EventInterface
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param \Schedule\Expression\ExpressionInterface $expression
     */
    public function setExpression(ExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return \Schedule\Expression\ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    public function isOccurring(\DateTime $dateTime)
    {
        return $this->expression->includes($dateTime, $this->event);
    }
}