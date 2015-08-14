<?php

namespace MintSoft\Schedule\Expression;

/**
 * Interface ExpressionInterface
 *
 * @package Schedule\Expression
 * @codeCoverageIgnore
 */
interface ExpressionInterface
{
    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    public function includes(\DateTime $date);
}