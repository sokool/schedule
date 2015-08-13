<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25/08/14
 * Time: 09:38
 */

namespace MintSoft\Schedule\Expression\Set;

use MintSoft\Schedule\Event\EventInterface;
use MintSoft\Schedule\Expression\ExpressionInterface;

class Difference implements ExpressionInterface
{
    public function includes(\DateTime $date, EventInterface $event)
    {
        // TODO: Implement includes() method.
    }
}