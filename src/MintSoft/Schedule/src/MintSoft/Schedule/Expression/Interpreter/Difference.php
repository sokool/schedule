<?php

namespace MintSoft\Schedule\Expression\Interpreter;

use MintSoft\Schedule\Expression\ExpressionGuardTrait;
use MintSoft\Schedule\Expression\ExpressionInterface as Expression;

/**
 * Class Difference
 *
 * @package MintSoft\Schedule\Expression\Interpreter
 */
class Difference implements Expression
{
    use ExpressionGuardTrait;

    /** @var Expression */
    protected $included;

    /** @var Expression */
    protected $excluded;

    /**
     * @param Expression $included
     * @param Expression $excluded
     */
    public function __construct(Expression $included, Expression $excluded)
    {
        $this->included = $included;
        $this->excluded = $excluded;
    }

    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    public function includes(\DateTime $date)
    {
        $includedValue = $this->expressionValue($this->included, $date);
        $excludedValue = $this->expressionValue($this->excluded, $date);

        return $includedValue && !$excludedValue;
    }
}