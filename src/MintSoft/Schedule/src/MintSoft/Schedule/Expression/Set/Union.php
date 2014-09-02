<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25/08/14
 * Time: 09:38
 */

namespace Schedule\Expression\Set;

use Schedule\Event\EventInterface;

/**
 * Class Union
 *
 * @link    http://i.stack.imgur.com/kIlCI.png
 * @package Schedule\Expression\Set
 */
class Union extends ExpressionSet
{
    public function includes(\DateTime $date, EventInterface $event)
    {

    }
}