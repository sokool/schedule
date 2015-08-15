<?php

namespace MintSoft\Schedule\Expression\Interpreter;

use MintSoft\Schedule\Expression\ExpressionInterface as Expression;

/**
 * Class ExpressionSet
 *
 * @package Schedule\Expression\Interpreter
 */
abstract class ExpressionSet implements Expression
{
    /**
     * @var Expression[]
     */
    protected $expressions = [];

    /**
     * @param Expression[] $expressions
     */
    public function __construct(array $expressions)
    {
        $this->expressions = $expressions;
    }

    /**
     * @param Expression $expression
     *
     * @return $this
     */
    public function addExpression(Expression $expression)
    {
        $this->expressions[] = $expression;

        return $this;
    }
}