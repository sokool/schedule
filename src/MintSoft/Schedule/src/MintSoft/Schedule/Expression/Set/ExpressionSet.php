<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25/08/14
 * Time: 09:39
 */

namespace MintSoft\Schedule\Expression\Set;

use MintSoft\Schedule\Expression\ExpressionInterface;

/**
 * Class ExpressionSet
 *
 * @package Schedule\Expression\Set
 */
abstract class ExpressionSet implements ExpressionInterface
{
    /**
     * @var ExpressionInterface[]
     */
    protected $expressions = [];

    /**
     * @param array $expressions
     */
    public function __construct(array $expressions = [])
    {
        foreach ($expressions as $exp) {
            $this->addExpression($exp);
        }
    }

    /**
     * @return array
     */
    public function getExpressions()
    {
        return $this->expressions;
    }

    /**
     * @param ExpressionInterface $expression
     *
     * @return $this
     */
    public function addExpression(ExpressionInterface $expression)
    {
        $fqdn = get_class($expression);
        if (array_key_exists($fqdn, $this->expressions)) {
            return $this;
        }

        $this->expressions[$fqdn] = $expression;

        return $this;
    }
}