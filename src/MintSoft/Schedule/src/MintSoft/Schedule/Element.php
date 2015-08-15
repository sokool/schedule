<?php

namespace MintSoft\Schedule;

use MintSoft\Schedule\Expression\ExpressionGuardTrait;
use MintSoft\Schedule\Expression\ExpressionInterface;

/**
 * Class Element
 *
 * @package MintSoft\Schedule
 */
class Element
{
    use ExpressionGuardTrait;

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

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string    $event
     * @param \DateTime $dateTime
     *
     * @return bool
     */
    public function isOccurring($event, \DateTime $dateTime)
    {
        return $event === $this->event ?
            $this->expressionValue($this->expression, $dateTime) :
            false;
    }
}