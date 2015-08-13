<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 09:28
 */

namespace MintSoft\Schedule\Expression;

use MintSoft\Schedule\Event\EventInterface;

/**
 * Interface ExpressionInterface
 * @package Schedule\Expression
 * @codeCoverageIgnore
 */
interface ExpressionInterface
{
    /**
     * @param \DateTime $date
     * @param EventInterface $event
     * @return mixed
     */
    public function includes(\DateTime $date, EventInterface $event);
}