<?php

namespace MintSoft\Schedule;

use MintSoft\Schedule\Expression\ExpressionInterface;

class Element
{
    /**
     * @var string
     */
    protected $event;

    /**
     * @var ExpressionInterface
     */
    protected $expression;

    /**
     * @param string              $event
     * @param ExpressionInterface $expression
     */
    public function __construct($event, ExpressionInterface $expression)
    {
        $this->event      = $event;
        $this->expression = $expression;
    }

//    public function __construct(EventInterface $event, ExpressionInterface $expression)
//    {
//        $this->event      = $event;
//        $this->expression = $expression;
//    }
//
//    /**
//     * @param \Schedule\Event\EventInterface $event
//     */
//    public function setEvent(EventInterface $event)
//    {
//        $this->event = $event;
//    }
//
    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }
//
//    /**
//     * @param \Schedule\Expression\ExpressionInterface $expression
//     */
//    public function setExpression(ExpressionInterface $expression)
//    {
//        $this->expression = $expression;
//    }
//
//    /**
//     * @return \Schedule\Expression\ExpressionInterface
//     */
//    public function getExpression()
//    {
//        return $this->expression;
//    }

//    public function isOccurring(\DateTime $dateTime)
//    {
//        return $this->expression->includes($dateTime, $this->event);
//    }

    /**
     * @param string    $event
     * @param \DateTime $dateTime
     *
     * @return bool
     */
    public function isOccurring($event, \DateTime $dateTime)
    {
        return $event === $this->event ? $this->expression->includes($dateTime) : false;
    }
}